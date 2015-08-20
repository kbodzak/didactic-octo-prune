  class itemSet {
       public $title = ""; //Title in dropdown.
       public $type = "custom"; //custom or global
       public $map = "any"; //SR, HA, TT, or CS
       public $mode = "any"; //CLASSIC, ARAM, ODIN
       public $priority = false; //(overrides sortrank)
       public $sortrank = 0; //sorted in descending order
       public $blocks = array();
       
       function __construct($ti, $ty, $ma, $mo, $pr, $so) {
           $this->title = $ti;
           $this->type = $ty;
           $this->map = $ma;
           $this->mode = $mo;
           $this->priority = $pr;
           $this->sortrank = $so;
       }
       
       function append_block($block) {
           $this->blocks[] = $block;
       }
}

class itemSet_block {
	public $type = "";
	public $recMath = false;
	public $minSummonerLevel = -1;
	public $maxSummonerLevel = -1;
	public $showIfSummonerSpell = ""; //get from staticDataAPI
	public $hideIfSummonerSpell = "";
	public $items = array();
	
	function __construct($ty, $re, $min, $max, $show, $hide) {
	    $this->type = $ty;
	    $this->recMath = $re;
	    $this->minSummonerLevel = $min;
	    $this->maxSummonerLevel = $max;
	    $this->showIfSummonerSpell = $show;
	    $this->hideIfSummonerSpell = $hide;
	}
	
	function append_item($item) {
	    $this->items[] = $item;
	}
}

class itemSet_item {
	var $id = "1001"; //from API
	var $count = 1;

	function __construct($item_id, $n) {
	    $this->id = $item_id;
	    $this->count = $n;
	}
}
    $test_block = new itemSet_block("First Block", true, 3, 5, "yes", "no");
    $test_block->append_item(new itemSet_item("1337", 1));
    $test_block->append_item(new itemSet_item("UMAD", 9001));
    $test = new itemSet("Test Set", "Test type", "some map", "some mode", true, 9);
    $test->append_block($test_block);
   
    $json_test = json_encode($test, JSON_PRETTY_PRINT);
    echo $json_test;


