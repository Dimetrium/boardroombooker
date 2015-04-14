<?
require_once 'MysqlTemplate.php';

class AdminSQL extends MysqlTemplate
{

/*	public function __construct()
	{
		//
	}

	protected function select($query)
	{
		parent::select($query);
	}

//	protected function mysqlQuery($query)
//	{
//	 	parent::mysqlQuery($query);
//	}

	protected function myId()
	{
		parent::myId();
	}*/


/*	public function logo()
	{
		$path = $_SERVER['HTTP_HOST'];
		$logo = '<div id="logo"><a href="http://'.$path.'/admin"><span id="logo-accent">B</span>ook <span id="logo-accent">M</span>agazine</a></div>';
		return print($logo);
	}*/

	public function redirect($http = false)
	{
		if ($http) 
		{
			$redirect = $http;
		}
		else 
		{
			$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
		@header("Location:".$redirect);
		exit;
		}	
	}

/*	public function bookMain()
	{
		$query = 
		"SELECT book_id, book_title, img, price, full_text 
		FROM xyz_books";

		$this->select($query);
		return $this->result;
	}*/

/*	public function getGenre()
	{
		$query = 
		"SELECT genre_title, genre_id 
		FROM xyz_genres";
		$this->select($query);
		return $this->result;
	}*/

	//get genre from ID
//	public function getGenreID($genre_id)
//	{
//		$query =
//		"SELECT genre_title
//		FROM xyz_genres
//		WHERE genre_id=$genre_id";
//		$this->select($query);
//		return $this->result;
//	}

	//page genre(add)
	public function idGengeAdd()
	{
		$genre_name = trim($_POST['genre_title']);
		if (empty($genre_name))
		{
			$_SESSION['genre_add']['res'] = "<div class='error'>The field is empty!</div>";
			return false;
		}
		else
		{
			$genre_name = $this->clear($genre_name); 
			$query = 
			"INSERT INTO xyz_genres (genre_title) 
			VALUES ('$genre_name')";
			$this->mysqlQuery($query);
			if ($this->rows > 0)
			{
				$_SESSION['answer']="<div class='success'>Your genre has add!</div>";
				return true;
			}
			else
			{  
				$_SESSION['genre_add']['res'] = "<div class='error'>Sorry, something went wrong!</div>";
				return false;
			}
		}
	}

	//page genre(edit)
	public function idGengeEdit($genre_id)
	{
		$genre_name = trim($_POST['name']);
		if (empty($genre_name))
		{
			$_SESSION['genre_edit']['res'] = "<div class='error'>The field is empty!</div>";
			return false;
		}
		else
		{
			$genre_name = $this->clear($genre_name);   
		}
		$query = 
		"UPDATE xyz_genres 
		SET genre_title='$genre_name' 
		WHERE genre_id=$genre_id";
		$this->mysqlQuery($query);
		if ($this->rows > 0)
		{
			$_SESSION['answer']="<div class='success'>Your genre has updated!</div>";
			return true;
		}
		else
		{  
			$_SESSION['genre_edit']['res'] = "<div class='error'>You do nothing!</div>";
			return false;
		}
	}

	//page ganre(delete)
	public function idGenreDel($genre_id)
	{
		$query = 
		"DELETE FROM xyz_genres 
		WHERE genre_id=$genre_id";
		$this->mysqlQuery($query);
		if ($this->rows > 0)
		{
			$_SESSION['answer'] = "<div class='success'>Genre deleted!</div>";
			return true;
		}
		else
		{
			$_SESSION['answer'] = "<div class='error'>Sorry, something went wrong!</div>";
			return false;
		}
	} 

	/*-------------------------AUTHOR----------------------------*/
	//get all authors
	public function getAuthors()
	{
		$query =
		"SELECT author_title, author_id
		FROM xyz_authors";
		$this->select($query);
		return $this->result;
	}

	//get authors from ID
	public function getAuthorId($authors_id)
	{
		$query = 
		"SELECT author_title 
		FROM xyz_authors 
		WHERE author_id=$authors_id";
		$this->select($query);
		return $this->result;
	}

	//page author(add)
	public function idAuthorAdd()
	{
		$author_name = trim($_POST['author_title']);
		$author_name = $this->clear($author_name); 
		$query = 
		"INSERT INTO xyz_authors (author_title) 
		VALUES ('$author_name')";
		$this->mysqlQuery($query);
	}

	//page author (edit)
	public function idAuthorEdit($authors_id)
	{
		$authors_name = trim($_POST['name']);
		if (empty($authors_name))
		{
			$_SESSION['authors_edit']['res'] = "<div class='error'>The field is empty!</div>";
			return false;
		}
		else
		{
			$authors_name = $this->clear($authors_name);   
		}
		$query = 
		"UPDATE xyz_authors 
		SET author_title='$authors_name' 
		WHERE author_id=$authors_id";
		$this->mysqlQuery($query);
	}

	//page author(delete)
	public function idAuthorDel($author_id)
	{
		$query = 
		"DELETE FROM xyz_authors 
		WHERE author_id=$author_id";
		$this->mysqlQuery($query);
		if ($this->rows > 0)
		{
			$_SESSION['answer'] = "<div class='success'>Author deleted!</div>";
			return true;
		}
		else
		{
			$_SESSION['answer'] = "<div class='error'>Sorry, something went wrong!</div>";
			return false;
		}
	}

	/*-------------------------BOOK----------------------------*/ 
	//details
/*	public function getProduct($book_id)
	{
		$query = 
		"SELECT DISTINCT xyz_books.book_id, price, book_title, img, full_text, 
		GROUP_CONCAT(DISTINCT author_title) as authors_name, 
		GROUP_CONCAT(DISTINCT genre_title SEPARATOR ', ') as genre_name 
		FROM xyz_books, xyz_authors, xyz_genres 
		INNER JOIN xyz_byauth, xyz_bycat 
		WHERE xyz_books.book_id = xyz_byauth.book_id 
		and xyz_authors.author_id = xyz_byauth.auth_id 
		and xyz_books.book_id = xyz_bycat.book_id 
		and xyz_genres.genre_id = xyz_bycat.cat_id 
		and xyz_books.book_id = $book_id  
		GROUP BY book_title";
		$this->select($query);
		return $this->result[0];
	}*/

	//deleting book
	public function delBook($book_id)
	{
		$query = 
		"DELETE FROM xyz_books 
		WHERE book_id = $book_id";
		$this->mysqlQuery($query);
	}

	/*-------------------------ADD BOOK----------------------------*/ 
	//add book
	public function addBook() 
	{
		$book_title = trim($_POST['book_title']);
		$price = round(floatval(preg_replace("#,#", ".", $_POST['price'])),2);
		$full_text = trim($_POST['full_text']);
		if (empty($book_title))
		{
			$_SESSION['book_add']['res'] = "<div class='error'>Need name!</div>";
			$_SESSION['book_add']['price'] = $price;
			$_SESSION['book_add']['full_text'] = $full_text;
			return false;
		}
		else
		{
			$book_title = $this->clear($book_title);
			$full_text = $this->clear($full_text);
			$query = 
			"INSERT INTO xyz_books (book_title, price, full_text) 
			VALUES ('$book_title', $price, '$full_text')";
			$this->mysqlQuery($query);
			$this->myId();
			$lastbookid = $this->id;
			if ($this->rows>0)
			{
				//Show authors       
				$author_name[] = $_POST['author_title'];
				foreach($author_name as $authors_name)
				{
					$query = 
					"SELECT author_id 
					FROM xyz_authors 
					WHERE author_title='$authors_name'";
					$this->select($query);
					$author_id =$this->result[0][author_id];
					$query = 
					"INSERT INTO xyz_byauth (auth_id, book_id) 
					VALUES ($author_id, $lastbookid)";
					$this->mysqlQuery($query);
				}
				//Show genre       
				$genr_name[] = $_POST['genre_title'];
				foreach($genr_name as $genre_name)
				{
					$query = 
					"SELECT genre_id 
					FROM xyz_genres 
					WHERE genre_title='$genre_name'";
					$this->select($query);
					$genre_id =$this->result[0][genre_id];
					$query = 
					"INSERT INTO xyz_bycat (cat_id, book_id) 
					VALUES ($genre_id, $lastbookid)";
					$this->mysqlQuery($query);
				}
				$_SESSION['book_add']['res'] .= "<div class='success'>Book added</div>";
				return true;
			}
			else
			{
				$_SESSION['book_add']['res'] = "<div class='success'>Sorry, something went wrong!</div>";
				return false;
			}
		}
	}

	/*-------------------------EDIT BOOK----------------------------*/ 
	//get data book
	public function getBookForupdate($book_id)
	{
		$query = 
		"SELECT DISTINCT xyz_books.book_id, price, book_title, img, full_text, 
		GROUP_CONCAT(DISTINCT author_title) as author_title, 
		GROUP_CONCAT(DISTINCT genre_title SEPARATOR ', ') as genre_title 
		FROM xyz_books, xyz_authors, xyz_genres 
		INNER JOIN xyz_byauth, xyz_bycat 
		WHERE xyz_books.book_id = xyz_byauth.book_id 
		and xyz_authors.author_id = xyz_byauth.auth_id 
		and xyz_books.book_id = xyz_bycat.book_id 
		and xyz_genres.genre_id = xyz_bycat.cat_id 
		and xyz_books.book_id = $book_id 
		GROUP BY book_title";
		$this->select($query);
		return $this->result[0];
	}

	//delete authors (edit book)
	public function delSelectAuthor($book_id, $alist)
	{
		$query = 
		"SELECT author_id 
		FROM xyz_authors 
		WHERE author_title = '$alist'";
		$this->select($query);
		$authlist = $this->result[0];
		foreach($authlist as $alist)
		{
			$result = "DELETE FROM xyz_byauth 
			WHERE book_id = $book_id 
			AND auth_id = $alist[author_id]";
			$delauth = $this->mysqlQuery($result);
		}
	}

	//delete genre (edit book)
	public function delSelectGenre($book_id, $glist)
	{
		$glist = trim($glist);
		$query = 
		"SELECT genre_id 
		FROM xyz_genres 
		WHERE genre_title = '$glist'";
		$this->select($query);
		$genrelist = $this->result[0];
		foreach ($genrelist as $glist)
		{
			$request = "DELETE FROM xyz_bycat 
			WHERE book_id = $book_id 
			AND cat_id = '$glist[genre_id]'";
			$delgen = $this->mysqlQuery($request);   
		}
	}

	//обновление данныйх в книге
	public function editBook($book_id)
	{
		$book_title = trim($_POST['book_title']);
		$price = round(floatval(preg_replace("#,#", ".", $_POST['price'])),2);
		$full_text = trim($_POST['full_text']);

		if (empty($book_title))
		{
			$_SESSION['book_edit']['res'] = "<div class='error'>Need name!</div>";
			$_SESSION['book_edit']['price'] = $price;
			$_SESSION['book_edit']['full_text'] = $full_text;
			return false;
		}
		else
		{
			$book_title = $this->clear($book_title);
			$full_text = $this->clear($full_text);
			$query = "UPDATE xyz_books SET book_title = '$book_title', price = $price, full_text = '$full_text' WHERE book_id = $book_id";
			$this->select($query);
			//Add authors (edit book)         
			if (!empty($_POST['alist']))
			{
				$author_name = $_POST['alist'];
				foreach ($author_name as $authors_name)
				{
					$query = 
					"SELECT author_id 
					FROM xyz_authors 
					WHERE author_title='$authors_name'";
					$this->select($query);
					$rez = $this->result[0];
					$query =
					"INSERT INTO xyz_byauth (auth_id, book_id) 
					VALUES ($rez[author_id], $book_id)";
					$this->mysqlQuery($query);
				}
			}
			//Add genre (edit book)       
			if (!empty($_POST['glist']))
			{
				$genr_name = $_POST['glist'];
				foreach ($genr_name as $genre_name)
				{
					$query = 
					"SELECT genre_id 
					FROM xyz_genres 
					WHERE genre_title='$genre_name'";
					$this->select($query);
					$rez = $this->result[0];
					$query =
					"INSERT INTO xyz_bycat (cat_id, book_id) 
					VALUES ($rez[genre_id], $book_id)";
					$this->mysqlQuery($query);
				}
			}   
		}
	}
}