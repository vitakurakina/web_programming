<?php
interface INewsDB{
	/**	
	 *	@param string
	 *	@param string
	 *	@param string
	 *	@param string
	 *	
	 *	@return boolean
	*/
	function saveNews($title, $category, $description, $source);
	
    /**	
	 *	@return array
	*/
	function getNews();
	
    /**
	 *	@param integer
	 *	
	 *	@return boolean
	*/
	function deleteNews($id);
}
?>