<?php



	/**
	 * Get Posts
	 *
	 * Grabs all posts from the DB
	 * And maybe formats them too, depending on $auto_format
	 *
	 * @param  bool|true  $auto_format  whether to format all the posts or not
	 * @return array
	 */
	function get_posts( $auto_format = true )
	{
		global $db;

		$query = $db->query( create_posts_query() );

		if ( $query->rowCount() )
		{
			$results = $query->fetchAll( PDO::FETCH_ASSOC );

//			if ( $auto_format ) {
//				$results = array_map( 'format_post', $results );
//			}
		}
		else
		{
			$results = [];
		}

		return $results;
	}




	/**
	 * Create Posts Query
	 *
	 * Put together the query to get posts
	 * We can add WHERE conditions too
	 *
	 * @param  string $where
	 * @return string
	 */
	function create_posts_query( $where = '' )
	{
		$query = "
			SELECT p.*
		    FROM posts p
		  
		";

		if ( $where ) {
			$query .= $where;
		}

		return trim( $query );
	}