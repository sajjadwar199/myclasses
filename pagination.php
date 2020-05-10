<?php  
require 'classes/message.php' ;
class pagination extends message{


    public static function paginate($query, $per_page = 10, $page = 1, $url = '?')
    {
        $c = new main;
        $conn = $c->connect();

        $query = "SELECT COUNT(*) as `num` FROM {$query}";
        $row = mysqli_fetch_array(mysqli_query($conn, $query));
        $total = $row['num'];
        $adjacents = "2";

        $prevlabel = "&lsaquo; Prev";
        $nextlabel = "Next &rsaquo;";
        $lastlabel = "Last &rsaquo;&rsaquo;";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;

        $lastpage = ceil($total / $per_page);

        $lpm1 = $lastpage - 1; // //last page minus 1

        $pagination = "";
        if ($lastpage > 1) {
            $pagination .= "<ul class='pagination'>";
            $pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";

            if ($page > 1) $pagination .= "<li><a href='{$url}page={$prev}'>{$prevlabel}</a></li>";

            if ($lastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination .= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";
                }
            } elseif ($lastpage > 5 + ($adjacents * 2)) {

                if ($page < 1 + ($adjacents * 2)) {

                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li><a class='current'>{$counter}</a></li>";
                        else
                            $pagination .= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";
                    }
                    $pagination .= "<li class='dot'>...</li>";
                    $pagination .= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                    $pagination .= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";
                } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {

                    $pagination .= "<li><a href='{$url}page=1'>1</a></li>";
                    $pagination .= "<li><a href='{$url}page=2'>2</a></li>";
                    $pagination .= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li><a class='current'>{$counter}</a></li>";
                        else
                            $pagination .= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";
                    }
                    $pagination .= "<li class='dot'>..</li>";
                    $pagination .= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                    $pagination .= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";
                } else {

                    $pagination .= "<li><a href='{$url}page=1'>1</a></li>";
                    $pagination .= "<li><a href='{$url}page=2'>2</a></li>";
                    $pagination .= "<li class='dot'>..</li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li><a class='current'>{$counter}</a></li>";
                        else
                            $pagination .= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";
                    }
                }
            }

            if ($page < $counter - 1) {
                $pagination .= "<li><a href='{$url}page={$next}'>{$nextlabel}</a></li>";
                $pagination .= "<li><a href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
            }

            $pagination .= "</ul>";
        }

        return $pagination;
    }


    public static function paginationshow($per_page, $statement, $loop = null)
    {

        $c = new main;
        $conn = $c->connect();

        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
        if ($page <= 0) $page = 1;

        //$per_page = 1; // Set how many records do you want to display per page.

        $startpoint = ($page * $per_page) - $per_page;

        // $statement = "`ad` "; // Change `records` according to your table name.

        $results = mysqli_query($conn, "SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

        if (mysqli_num_rows($results) != 0) {

            // displaying records.
            while ($row = mysqli_fetch_object($results)) {


                //write you data show


            }
        } else {
            echo "No records are found.";
        }



        echo '
        <Style>
ul.pagination {
	text-align:center;
	color:#829994;
}
ul.pagination li {
	display:inline;
	padding:0 3px;
}
ul.pagination a {
	color:#0d7963;
	display:inline-block;
	padding:5px 10px;
	border:1px solid #cde0dc;
	text-decoration:none;
}
ul.pagination a:hover, 
ul.pagination a.current {
	background:#0d7963;
	color:#fff; 
}
        
        </Style>
        
        
        ';
        // displaying paginaiton.
        echo $c->paginate($statement, $per_page, $page, $url = '?');
    }
}
?>