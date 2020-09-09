<?php  
require 'classes/message.php' ;
class pagination extends message{
    
   //class by sajjad kareem

   
   /* الجدول  */ private $table;
   /* الصفحة */ private $page;
   /* where */ private $where;
  /* عدد العناصر في الصفحة */ private $limit=5;
  /* عدد العناصر التي ستعرض في الصفحة */ private $number_show;
  /* تحديد عددالروابط في الوسط */ private $links_between;

private function page_get(){
   if(isset($_GET['page'])){
                $page=$_GET['page'];
                if($page==0||$page<1){
                $this->number_show=0;
                }else{
                $this->number_show=($page * $this->limit) - $this->limit;
    } 
    }else{
        $this->number_show=0;
    }
    }
public function paginate_option($table,$page,$limit=null,$where=null,$links_between=null){
    $this->links_between=$links_between;
    $this->table=$table;
    $this->page=$page;
    $this->where=$where;
    if(isset($limit)){
        $this->limit=$limit;
    }
    /* فحص الصفحات في الرابط */ $this->page_get(); 

}
public function prev(){
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
       if($page>1){
           $mins=$page-1;
      
    $prev_btn=" <li class='page-item'>"."<a class='page-link' href=$this->page?page=$mins  >&laquo;</a>"."</li>";
      return $prev_btn;
       }
    
}
private function next($rowsperpage){
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
       if($page+1<=$rowsperpage){
        $pos=$page+1;
      
    $next_btn=" <li class='page-item'>"."<a class='page-link' href=$this->page?page=$pos  >&raquo;</a>"."</li>";
      return $next_btn;
       }
    
}
private function links($rowsperpage){
   
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
        } // your current page
    // $pages=20; // Total number of pages
    if($this->links_between!=''){
        $limit=$this->links_between;
    }else{
        $limit=5  ; /* عدد الصفحات التي تضهر في وسط تعداد الصفحات */

    }

    if ($rowsperpage >=1 && $page <= $rowsperpage)
    {
        $counter = 1;
        $link = "";
        if ($page > ($limit/2))
           { $link .= 
            "
            <li  class='page-item'> 
            <a   class='page-link'  href=\"?page=1\">1 </a>   <a    class='page-link'>...</a>

            </li>
            
            ";
        
        }
        for ($i=$page; $i<=$rowsperpage;$i++)
        {

            if($counter < $limit)
            if($i==@$page){
                $link .= "
                <li class='page-item active'>
            
                <a    class='page-link'   href=\"?page=" .$i."\">".$i." </a>
                
                </li>
                ";
            }else{
                $link .= "
                <li  class='page-item'> 
                <a    class='page-link'   href=\"?page=" .$i."\">".$i." </a>
                
                </li>
                ";
            }
          

            $counter++;
        }
        if ($page < $rowsperpage - ($limit/2))
         { $link .=   "
            
            <li  class='page-item'> 
            <a   class='page-link' >...</a>  <a   class='page-link'   href=\"?page=" .$rowsperpage."\">".$rowsperpage." </a>
            </li>
            
            "; }
    }

    echo $link;

}
public function paginate_links(){
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }
            $c = new database;
            $conn = $c->connect();
        /* عدد العناصر في الجدول */  $count_items="SELECT COUNT(*) from $this->table $this->where ";
            /* استعلام عن عدد العناصر في الجدول */  $excecute_pagination=mysqli_query( $conn,$count_items);
            $row_pagination=mysqli_fetch_array($excecute_pagination);
            /* جميع الصفوف */ $total_rows=array_shift($row_pagination);
            /*  عدد الروابط في الصفحة في الصفحة    */$rowsperpage=$total_rows/$this->limit;
            $rowsperpage=ceil($rowsperpage);
            if(!isset($page)||$page==''||$page<1){
                $page=1;
            }
        
                
        
            ?>
            <nav aria-label="Page navigation example">
                
        <ul class="pagination">
    <!--prec btn -->  <?php   echo  $this->prev(); ?>

  
    <?php    echo $this->links($rowsperpage);  ?>
         


 <!--next btn --><?php echo $this->next($rowsperpage);   ?>
        </nav>
        <?php 
}
public  function show_with_pagination(){
 
    $c = new database;
    $conn = $c->connect();
    $query = "SELECT * FROM $this->table   $this->where   LIMIT $this->number_show,$this->limit";
    
    $q= mysqli_query($conn,$query);
    if ($q == false) {
     return false;
    }
    $rows = array();
    while ($row =mysqli_fetch_object($q)) {
     $rows[] = $row;
    }
   
    return $rows;
        
   } 




};
?>
