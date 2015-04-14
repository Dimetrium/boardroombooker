<?
class Controller
  {
    public function __construct()
      {
        $this->loadData();
      }

    private function loadData()
      {
        $admsql = new AdminSQL();
        $view =  empty($_GET['view']) ?  'featured' :  $_GET['view'];
        switch($view)
          {
            case ('featured'):
                $booksmain = $admsql->bookMain();
            break;
      
            case ('data'):
                $book_id = abs((int)$_GET['book_id']);
                    if($book_id)
                        {
                            $product = $admsql->getProduct($book_id);
                            $book_name = $product['book_name'];
                        }
            break;
            /*-------------------------GENRE----------------------------*/  
            // page genre (list genre)
            case ('editgenre'):
                $getgenre = $admsql->getGenre();
            break;
             
            // page genre (add genre)   
            case('genre_add'):
               if($_POST)
                  {
                    if($admsql->idGengeAdd()) $admsql->redirect('?view=editgenre');
                    else $admsql->redirect();
                  }
            break;

            // page genre (edit genre)
            case ('genre_edit'):
                $genre_id = abs((int)$_GET['genre_id']);
                $get_genre_id = $admsql->getGenreID($genre_id);
                if($_POST)
                   {
                      if($admsql->idGengeEdit($genre_id)) $admsql->redirect('?view=editgenre');
                      else $admsql->redirect();
                   }
            break;

            // page genre (delete genre)
            case('genre_del'):
               $genre_id = abs((int)$_GET['genre_id']);
               $admsql->idGenreDel($genre_id);
               $admsql->redirect();
            break;

            /*-------------------------AUTHOR----------------------------*/    
            // page author (list author)   
            case ('editauthors'):
                $getauthors = $admsql->getAuthors();
            break;

            // page author (add author)    
            case('author_add'):
                if($_POST)
                    {
                      if($admsql->idAuthorAdd()) $admsql->redirect('?view=editauthors');
                      else $admsql->redirect();
                    }
            break;

            // page author (edit author)
            case ('author_edit'):
                 $authors_id = abs((int)$_GET['authors_id']);
                 $get_author_id = $admsql->getAuthorId($authors_id);
                 if($_POST)
                    {
                      if($admsql->idAuthorEdit($authors_id)) $admsql->redirect('?view=editauthors');
                      else $admsql->redirect();
                    }
            break;

            // page author (delete author)    
            case('author_del'):
                 $author_id = abs((int)$_GET['authors_id']);
                 $admsql->idAuthorDel($author_id);
                 $admsql->redirect();
            break;
             
            /*-------------------------BOOK----------------------------*/    
            // book details    
            case ('data'):
                $book_id = abs((int)$_GET['book_id']);
                if($book_id)
                    {
                      $product = $admsql->get_book($book_id);
                    }
            break;

            //delete book
            case ('delbook'): 
                $book_id = abs((int)$_GET['book_id']);
                $admsql->delBook($book_id);
                $admsql->redirect(); 
            break;
         
            //add book    
            case ('addbook'):
                $getgenre = $admsql->getGenre();
                $getauthors = $admsql->getAuthors();
                /*var_dump($_POST); die();*/
                if($_POST)
                    {
                        if($admsql->addBook()) $admsql->redirect('?view=addbook');
                        else $admsql->redirect();
                    }
            break;
            /*-------------------------EDIT BOOK----------------------------*/ 
            case ('editbook'):
                $getgenre = $admsql->getGenre();
                $getauthors = $admsql->getAuthors();
                $book_id = (int)$_GET['book_id'];
                $get_book = $admsql->getBookForupdate($book_id);
                  if($get_book['author_title'])
                    {
                      $authorslist = explode(",", $get_book['author_title']);
                      foreach($authorslist as $alist)
                        {
                          $authorlist .= "<p><input type='checkbox' name='alistA[]' value='$alist'>$alist</p>";
                        }
                    }

                  if($get_book['genre_title'])
                    {
                      $genrelist = explode(",", $get_book['genre_title']);
                      foreach($genrelist as $glist)
                        {
                            $genlist .= "<p><input type='checkbox' name='glistB[]' value='$glist'>$glist</p>";
                        }
                    }

                  if(!empty($_POST['alistA']))
                    {

                      $authlist = $_POST['alistA'];
                      foreach($authlist as $alist)
                        {
                          $delauth = $admsql->delSelectAuthor($book_id, $alist);
                        }
                    }

                  if(!empty($_POST['glistB']))
                      {
                        $genlist = $_POST['glistB'];
                        foreach($genlist as $glist)
                          {
                              $delgen = $admsql->delSelectGenre($book_id, $glist);
                          }
                      }

                $edit_book = $admsql->editBook($book_id);
                  if($_POST)
                      {
                        if($admsql->editBook($book_id))
                          { 
                            $admsql->redirect('?view=featured');
                          }
                        else $admsql->redirect();
                      }
            break;

            default:
                $view = 'featured';
          }
        require_once ADMIN_TEMPLATE.'index.php';
      } 
  }
