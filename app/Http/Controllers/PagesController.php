<?php namespace App\Http\Controllers;

use App\Page;
use Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class PagesController extends Controller {

	public function __construct($perPage,$instance){
		$this->_instance = $instance;
		$this->pagesize = $perPage;
		$this->set_instance();
	}
  public function show($id)
  {
    return view('pages.show')->withPage(Page::find($id));
  }
  
 // 分页方法：
  public function query_listinfo(&$sql = '', $pageindex = 1, $pagesize = 20,&$data) {
  	//取得记录总数$rs，计算总页数用
  	$array=DB::select("SELECT count(1) as total FROM (".$sql.") as a");
  	$this->_totalRows=intval($array[0]->total);
  	$this->pagesize= $pagesize;
  	$this->_page=$pageindex;
  	//计算总页数
  	$pagecount=intval(intval($this->_totalRows)/$pagesize);
  	if ($this->_totalRows%$pagesize) {
  		$pagecount++;
  	}
  	//设置页数
  	if (isset($pageindex)){
  		$pageindex=intval($pageindex);
  	}
  
  	//计算记录偏移量
  	$offset=$pagesize*($pageindex - 1);
  	//读取指定记录数
  	$infos=  DB::select("$sql limit $offset,$pagesize");
  	
  	$mpages =array();
  	$data['pageindex']=$pageindex;
  	$data['totalRows']=$this->_totalRows;
  	$data['pagesize']=$pagesize;
  	$data['pagecount']=$pagecount;
  	$data['data']=$infos;
  	$data['page_links'] = $this->page_links('?act=2&page',"");
  	return $data;
  }
  private $_page;
  private $_totalRows = 0;
  private $pagesize;//页大小
  private $_instance;
  public function page_links($path='?',$ext=null)
  {
  	$adjacents = "2";
  	$prev = $this->_page - 1;
  	$next = $this->_page + 1;
  	$lastpage = ceil($this->_totalRows/$this->pagesize);
  	$lpm1 = $lastpage - 1;
  
  	$pagination = "";
  	Log::error($this->_totalRows.",".$this->pagesize.",".'$lastpage:' . $lastpage);
  	if($lastpage > 1)  	{
  		
  		$pagination .= "<ul class='pagination'>";
  		if ($this->_page > 1) {
  			$pagination.= "<li class='active'><a href='" . $path . "$this->_instance=$prev" . "$ext'><<</a></li>";
  		} else {
  			$pagination.= "<li class='disabled'><span ><<</span></li>";
  		}
  
  		if ($lastpage < 7 + ($adjacents * 2))
  		{
  			for ($counter = 1; $counter <= $lastpage; $counter++)
  			{
  				if ($counter == $this->_page) {
  					$pagination.= "<li><span class='current'>$counter</span></li>";
  				} else {
  					$pagination.= "<li><a href='" . $path . "$this->_instance=$counter" . "$ext'>$counter</a></li>";
  				}
  			}
  		}
  		elseif($lastpage > 5 + ($adjacents * 2))
  		{
  			if($this->_page < 1 + ($adjacents * 2))
  			{
  				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
  				{
  					if ($counter == $this->_page) {
  						$pagination.= "<li><span class='current'>$counter</span></li>";
  					} else {
  						$pagination.= "<li><a href='" . $path . "$this->_instance=$counter" . "$ext'>$counter</a></li>";
  					}
  				}
  				$pagination.= "...";
  				$pagination.= "<li><a href='".$path."$this->_instance=$lpm1"."$ext'>$lpm1</a></li>";
  				$pagination.= "<li><a href='".$path."$this->_instance=$lastpage"."$ext'>$lastpage</a></li>";
  			}
  			elseif($lastpage - ($adjacents * 2) > $this->_page && $this->_page > ($adjacents * 2))
  			{
  				$pagination.= "<li><a href='".$path."$this->_instance=1"."$ext'>1</a></li>";
  				$pagination.= "<li><a href='".$path."$this->_instance=2"."$ext'>2</a></li>";
  				$pagination.= "...";
  				for ($counter = $this->_page - $adjacents; $counter <= $this->_page + $adjacents; $counter++)
  				{
  					if ($counter == $this->_page) {
  						$pagination.= "<li><span class='current'>$counter</span></li>";
  					} else {
  						$pagination.= "<li><a href='" . $path . "$this->_instance=$counter" . "$ext'>$counter</a></li>";
  					}
  				}
  				$pagination.= "..";
  				$pagination.= "<li><a href='".$path."$this->_instance=$lpm1"."$ext'>$lpm1</a></li>";
  				$pagination.= "<li><a href='".$path."$this->_instance=$lastpage"."$ext'>$lastpage</a></li>";
  			}
  			else
  			{
  				$pagination.= "<li><a href='".$path."$this->_instance=1"."$ext'>1</a></li>";
  				$pagination.= "<li><a href='".$path."$this->_instance=2"."$ext'>2</a></li>";
  				$pagination.= "..";
  				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
  				{
  					if ($counter == $this->_page) {
  						$pagination.= "<li><span class='current'>$counter</span></li>";
  					} else {
  						$pagination.= "<li><a href='" . $path . "$this->_instance=$counter" . "$ext'>$counter</a></li>";
  					}
  				}
  			}
  		}
  
  		if ($this->_page < $counter - 1) {
  			$pagination.= "<li><a href='" . $path . "$this->_instance=$next" . "$ext'>>></a></li>";
  		} else {
  			$pagination.= "<li class='disabled'><span>>></span></li>";
  		}
  		$pagination.= "</ul>\n";
  	}
  	Log::error('pagination:' . $pagination);
  
  	return $pagination;
  }

}
