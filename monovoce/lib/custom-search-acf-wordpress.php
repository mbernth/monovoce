<?php

/*
##############################
########### Search ###########
##############################
*/

/**
 *
 * [list_searcheable_acf list all the custom fields we want to include in our search query]
 * @return [array] [list of custom fields]
 * Included are steps to help make this script easier for other to follow
 * I also updated this work to include XSS and SQL injection projection
 * 1- Define list of ACF fields you want to search through - do NOT include taxonomies here
 * See step 8 for taxonomy inclusion
 */
function list_searcheable_acf(){
  $list_searcheable_acf = array(
		"row_headline", 
		"content", 
		"team_headline", 
		"team", 
		"associated_partners", 
		"associated_partners_headline", 
		"name", 
		"option"
	);
  return $list_searcheable_acf;
}

/**
 * [advanced_custom_search search that encompasses ACF/advanced custom fields and taxonomies and split expression before request]
 * @param  [query-part/string]      $search    [the initial "where" part of the search query]
 * @param  [object]                 $wp_query []
 * @return [query-part/string]      $search    [the "where" part of the search query as we customized]
 * modified from gist: https://gist.github.com/FutureMedia/9581381/73afa809f38527d57f4213581eeae6a8e5a1340a
 * see https://vzurczak.wordpress.com/2013/06/15/extend-the-default-wordpress-search/
 * credits to Vincent Zurczak for the base query structure/spliting tags section
 */
 function advanced_custom_search( $search, &$wp_query ) {
     global $wpdb;

     if ( empty( $search )) {
	return $search;
     }

     // 1- get search expression
     $terms_raw = $wp_query->query_vars[ 's' ];

     // 2- check search term for XSS attacks
     $terms_xss_cleared = strip_tags($terms_raw);

     // 3- do another check for SQL injection, use WP esc_sql
     $terms = esc_sql($terms_xss_cleared);

     // 4- explode search expression to get search terms
     $exploded = explode( ' ', $terms );
     if( $exploded === FALSE || count( $exploded ) == 0 ) {
	$exploded = array( 0 => $terms );
     }

     // 5- setup search variable as a string
     $search = '';

     // 6- get searcheable_acf, a list of advanced custom fields you want to search content in
     $list_searcheable_acf = list_searcheable_acf();

     // 7- search through tags, inject each into SQL query
     foreach( $exploded as $tag ) {
         $search .= "
           AND (
             (wp_posts.post_title LIKE '%$tag%')
             OR (wp_posts.post_content LIKE '%$tag%')
             OR EXISTS (
               SELECT * FROM wp_postmeta
 	              WHERE post_id = wp_posts.ID
 	                AND (";
 	 // 7b - add each custom post-type into SQL query
         foreach ($list_searcheable_acf as $searcheable_acf) {
           if ($searcheable_acf == $list_searcheable_acf[0]) {
             $search .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
           } else {
             $search .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
           }
         }
	// 8- Add to search string info from comments and custom taxonomies
	// You would need to customize the taxonomies below to match your site
 	        $search .= ")
             )
             OR EXISTS (
               SELECT * FROM wp_comments
               WHERE comment_post_ID = wp_posts.ID
                 AND comment_content LIKE '%$tag%'
             )
             OR EXISTS (
               SELECT * FROM wp_terms
               INNER JOIN wp_term_taxonomy
                 ON wp_term_taxonomy.term_id = wp_terms.term_id
               INNER JOIN wp_term_relationships
                 ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
               WHERE (
           		taxonomy = 'your'
			OR taxonomy = 'custom'
			OR taxonomy = 'taxonomies'
			OR taxonomy = 'here'
           	)
               	AND object_id = wp_posts.ID
               	AND wp_terms.name LIKE '%$tag%'
             )
         )";
     }
     return $search;
 }

// 9- use add_filter to put advanced_custom_search into the posts_search results
add_filter( 'posts_search', 'advanced_custom_search', 500, 2 );