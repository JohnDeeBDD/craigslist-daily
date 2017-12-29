<?php

class CraigslistRawDumpProcessorTest extends \Codeception\TestCase\WPTestCase{
    
    /**
     * @test
     * it should be instantiatable
     */
    public function it_should_be_instantiatable(){
        $CraigslistRawDumpProcessor= new CRGDaily\CragslistRawDumpProcessor();
    }
    
    /**
     * @test
     * it should return a processed array
     */
    public function it_should_returnProcessedArray(){
        $CraigslistRawDumpProcessor= new CRGDaily\CragslistRawDumpProcessor();
        $HTMLcUrlDump = $this->HTMLcUrlDump;
        $expectedArray = array();
        array_push($expectedArray, '<a href="https://bend.craigslist.org/med/d/graphic-designer/6435271713.html" data-id="6435271713" class="result-title hdrlnk">Graphic Designer</a>');        
        $returnedArray = $CraigslistRawDumpProcessor->returnAnchorArray($HTMLcUrlDump, "bend");
        $x = var_export($returnedArray, TRUE);
        $y = var_export($expectedArray, TRUE);
        $this->assertEquals($expectedArray, $returnedArray, "Returned array: $x Expected: $y");
    }
    
    public $HTMLcUrlDump = <<<HTMLcUrlDump

<!DOCTYPE html>
<html class="no-js"><head>
    <title>bend jobs &quot;wordpress&quot; - craigslist</title>

    <meta name="description" content="bend jobs &quot;wordpress&quot; - craigslist">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <link rel="canonical" href="https://bend.craigslist.org/search/jjj">
    <link rel="alternate" type="application/rss+xml" href="https://bend.craigslist.org/search/jjj?format=rss&amp;query=wordpress&amp;sort=date" title="RSS feed for craigslist | bend jobs &quot;wordpress&quot; - craigslist">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link type="text/css" rel="stylesheet" media="all" href="//www.craigslist.org/styles/cl.css?v=58db8b9d287844a7f120e277e3e8439c">
    <link type="text/css" rel="stylesheet" media="all" href="//www.craigslist.org/styles/search.css?v=27e1d4246df60da5ffd1146d59a8107e">
    <link type="text/css" rel="stylesheet" media="all" href="//www.craigslist.org/styles/jquery-ui-clcustom.css?v=3b05ddffb7c7f5b62066deff2dda9339">
<link type="text/css" rel="stylesheet" media="all" href="//www.craigslist.org/styles/leaflet.css?v=a3659216b188171f9645f20cd0b4e60e">
<link type="text/css" rel="stylesheet" media="all" href="//www.craigslist.org/styles/MarkerCluster.css?v=9bea97021e746649c6837e95dd9723e8">
<link type="text/css" rel="stylesheet" media="all" href="//www.craigslist.org/styles/tocsmaps.css?v=0643bce4a898776e6e10a86823bab509">
<!--[if IE]>
    <link type="text/css" rel="stylesheet" media="all" href="//www.craigslist.org/styles/tocsmaps-ie.css?v=b21742b2ebe243963373e956ea115db0">
<![endif]-->

    
        <script type="text/javascript"><!--
var areaCountry = "US";
var areaID = "233";
var areaRegion = "OR";
var catAbb = "jjj";
var countOfTotalText = "image {count} of {total}";
var currencySymbol = "";
var defaultView = "list";
var expiredFavIDs = null;
var imageConfig = {"1":{"hostname":"https://images.craigslist.org","sizes":["50x50c","300x300","600x450","1200x900"]},"0":{"hostname":"https://images.craigslist.org","sizes":["50x50c","300x300","600x450"]},"2":{"hostname":"https://images.craigslist.org","sizes":["50x50c","300x300","600x450","1200x900"]}};
var lessInfoText = "less info";
var maptileBaseUrl = "//map{s}.craigslist.org/t09/{z}/{x}/{y}.png";
var maxResults = 2500;
var noImageText = "no image";
var pID = null;
var postalLat = null;
var postalLon = null;
var purveyorCategories = null;
var searchDistance = null;
var sectionAbb = "jjj";
var sectionBase = "jjj";
var showInfoText = "show info";
var showMapTabs = 1;
var showingBanished = 0;
var showingFavorites = 0;
var starHint = "save this post in your favorites list";
var subarea = null;
var zoomToPosting = null;
--></script>
    
    <!--[if lt IE 9]>
<script src="//www.craigslist.org/js/html5shiv.min.js?v=c0739b14a84b052680cdee44fea07435" type="text/javascript" ></script>

<script src="//www.craigslist.org/js/respond-fork.min.js?v=247e877d69233f6f77bff30aca7b5473" type="text/javascript" ></script>

<![endif]-->
<!--[if lte IE 7]>
<script src="//www.craigslist.org/js/json2.min.js?v=6e47a4bb061d538548771024390aa00b" type="text/javascript" ></script>

<![endif]-->
</head>
<body class="search has-map en">
    <script type="text/javascript"><!--
    function C(k){return(document.cookie.match('(^|; )'+k+'=([^;]*)')||0)[2]}
    var pagetype, pagemode;
    (function(){
        var h = document.documentElement;
        h.className = h.className.replace('no-js', 'js');
        var b = document.body;
        var bodyClassList = b.className.split(/\s+/);;
        pagetype = bodyClassList[0]; // dangerous assumption
        var fmt = C('cl_fmt');
        if ( fmt === 'regular' || fmt === 'mobile' ) {
            pagemode = fmt;
        } else if (screen.width <= 480) {
            pagemode = 'mobile';
        } else {
            pagemode = 'regular';
        }
        pagemode = pagemode === 'mobile' ? 'mobile' : 'desktop';
        bodyClassList.push(pagemode);
        if (C('hidesearch') === '1' && pagemode !== 'mobile') {
            bodyClassList.push('hide-search');
        }
        var width = window.innerWidth || document.documentElement.clientWidth;
        if (width > 1000) { bodyClassList.push('w1024'); }
        if (typeof window.sectionBase !== 'undefined') {
            var mode = (decodeURIComponent(C('cl_tocmode') || '').match(new RegExp(window.sectionBase + ':([^,]+)', 'i')) || {})[1] || window.defaultView;
            if (mode) {
                bodyClassList.push(mode);
            }
        }
        b.className = bodyClassList.join(' ');
    }());
--></script>


    <section class="page-container" id="page-top">
        <div class="bglogo"></div>
        <header class="global-header wide">
   <a class="header-logo" name="logoLink" href="/">CL</a>

    <nav class="breadcrumbs-container">
<form id="breadcrumbform" class="breadcrumbs-form" method="get" action="/search/jjj" data-action="/search/###/jjj">
    <input type="hidden" name="sort" value="date"><input type="hidden" name="query" value="wordpress">
    <ul class="breadcrumbs ">
        <li class="crumb area">
            
            <span class="no-js">
                <a href="/">bend</a>
            </span>
                <select name="areaAbb" id="areaAbb" class="js-only">
                    <option value="bend">bend</option>
                        <option value="corvallis">corvallis</option>
                        <option value="eastoregon">east oregon</option>
                        <option value="eugene">eugene</option>
                        <option value="klamath">klamath falls</option>
                        <option value="medford">medford</option>
                        <option value="oregoncoast">oregon coast</option>
                        <option value="portland">portland</option>
                        <option value="roseburg">roseburg</option>
                        <option value="salem">salem</option>
                        <option value="siskiyou">siskiyou co</option>
                        <option value="kpr">tri-cities, WA</option>
                        <option value="yakima">yakima</option>
                </select>
            <span class="breadcrumb-arrow">&gt;</span>
        </li>
        <li class="crumb section">
                    <select name="catAbb" id="catAbb">
                        <option value="ccc">community</option>
                        <option value="eee">events</option>
                        <option value="sss">for sale</option>
                        <option value="ggg">gigs</option>
                        <option value="hhh">housing</option>
                        <option value="jjj" selected>jobs</option>
                        <option value="ppp">personals</option>
                        <option value="rrr">resumes</option>
                        <option value="bbb">services</option>
                    </select>
                <span class="breadcrumb-arrow">&gt;</span>
        </li>
        <li class="crumb category">
            <select id="subcatAbb" class="js-only">
                <option value="jjj">all</option>
                    <option value="ofc">admin/office</option>
                    <option value="bus">business</option>
                    <option value="csr">customer service</option>
                    <option value="edu">education</option>
                    <option value="egr">engineering</option>
                    <option value="etc">etcetera</option>
                    <option value="acc">finance</option>
                    <option value="fbh">food/bev/hosp</option>
                    <option value="lab">general labor</option>
                    <option value="gov">government</option>
                    <option value="hea">healthcare</option>
                    <option value="hum">human resource</option>
                    <option value="eng">internet engineering</option>
                    <option value="lgl">legal</option>
                    <option value="mnu">manufacturing</option>
                    <option value="mar">marketing</option>
                    <option value="med">media</option>
                    <option value="npo">nonprofit</option>
                    <option value="rej">real estate</option>
                    <option value="ret">retail/wholesale</option>
                    <option value="sls">sales</option>
                    <option value="spa">salon/spa/fitness</option>
                    <option value="sci">science</option>
                    <option value="sec">security</option>
                    <option value="trd">skilled trades</option>
                    <option value="sof">software</option>
                    <option value="sad">systems/networking</option>
                    <option value="tch">tech support</option>
                    <option value="trp">transport</option>
                    <option value="tfr">tv video radio</option>
                    <option value="web">web design</option>
                    <option value="wri">writing</option>
            </select><span class="no-js">jobs</span>
            <span class="breadcrumb-arrow">&gt;</span>
        </li>
        <li class="crumb no-js">
            <input type="submit" value="go">
        </li>
    </ul>
</form>
    </nav>

<div class="userlinks">
    <ul class="user-actions">
        <li class="user post">
            <a href="https://post.craigslist.org/c/bnd">post</a>
        </li>
        <li class="user account">
            <a href="https://accounts.craigslist.org/login/home">account</a>
        </li>
    </ul>
    <ul class="user-favs-discards">
        <li class="user">
            <div class="favorites">
                <a href="#" class="favlink"><span class="icon icon-star fav" aria-hidden="true"></span><span class="fav-number">0</span><span class="fav-label"> favorites</span></a>
            </div>
        </li>
        <li class="user discards">
          <form class="unfavform js-only" method="POST" action="/favorites">
            <div class="to-banish-page">
              <input type="hidden" class="lastLink" name="lastLink" value="//bend.craigslist.org/search/jjj?query=wordpress&amp;sort=date">
              <input type="hidden" class="lastTitle" name="lastTitle" value="bend jobs &quot;wordpress&quot; - craigslist">
              <input type="hidden" class="unfaves" name="fl">
              <input type="hidden" name="uf" value="1">
              <a href="#" class="to-banish-page-link">
                <span class="icon icon-trash red" aria-hidden="true"></span>
                <span class="banished_count">0</span>
                <span class="discards-label"> hidden</span>
              </a>
            </div>
          </form>
        </li>
    </ul>
</div>

</header>
<header class="global-header narrow">
   <a class="header-logo" href="/">CL</a>
    <nav class="breadcrumbs-container">

<ul class="breadcrumbs">


bend            &gt;

jobs

</ul>


    </nav>
    <span class="linklike show-wide-header">...</span>
</header>


        <form id="searchform" class="search-form" action="/search/jjj"  >
           
            <div class="querybox">
                
                <div class="form-tab js-only"><span class="search-open" title="hide search">&laquo;</span><span class="search-closed" title="show search">&raquo;</span></div>
                <input type="text" placeholder="search jobs" name="query"
                    id="query" value="wordpress" autocorrect="off" class="flatinput ui-autocomplete-input"
                    autocapitalize="off" autocomplete="off" data-autocomplete="search">

                <button type="submit" class="searchbtn">
                    <span class="icon icon-search" aria-hidden="true"></span>
                    <span class="screen-reader-text">press to search craigslist</span>
                </button>
                    <div class="savealert">
                        <a class="saveme" data-action="save"  href="https://accounts.craigslist.org/login?rt=L&amp;rp=%2Fsavesearch%2Fsave%3FURL%3Dhttps%253A%252F%252Fbend%252Ecraigslist%252Eorg%252Fsearch%252Fjjj%253Fquery%253Dwordpress%2526sort%253Ddate"  title="save this search" >save search</a>
                    </div>
            </div>

            <div class="search-options-container">
    <h2 class="search-options-header linklike">
        <div class="icon icon-toggle-gear" aria-hidden="true"></div>
        options<span class="options-close">close</span>
    </h2>
    <input id="excats" type="hidden" name="excats">
        <input type="hidden" name="sort" value="date">
    <div class="search-options">
        <div class="searchgroup categories">
            <div class="cattitle">
                  <a href="/search/jjj" title="clear all search parameters" class="reset">jobs</a>
            </div>

<ul class="maincats">
    <li>
           <input type="checkbox" name="cat_id"
               value="25" class="catcheck multi_checkbox"
               data-abb="med" id="cat_med"
               checked="checked">
        <a href="/search/med?query=wordpress&amp;sort=date" class="category">art/media/design</a> <span class="count">1</span>
    </li>

        <li class="morecats js-only closed">

            <span class="linklike closed"><span class="plusminus">+</span>show 31 more</span>
            <span class="linklike open"><span class="plusminus">&ndash;</span>hide 31 more</span>

            <span class="count">0</span>
    </li>
</ul>

    <ul class="othercats closed">
    <li>
           <input type="checkbox" name="cat_id"
               value="130" class="catcheck multi_checkbox"
               data-abb="lab" id="cat_lab"
               checked="checked">
        <a href="/search/lab?query=wordpress&amp;sort=date" class="category">general labor</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="55" class="catcheck multi_checkbox"
               data-abb="tch" id="cat_tch"
               checked="checked">
        <a href="/search/tch?query=wordpress&amp;sort=date" class="category">technical support</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="50" class="catcheck multi_checkbox"
               data-abb="sad" id="cat_sad"
               checked="checked">
        <a href="/search/sad?query=wordpress&amp;sort=date" class="category">systems/networking</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="57" class="catcheck multi_checkbox"
               data-abb="edu" id="cat_edu"
               checked="checked">
        <a href="/search/edu?query=wordpress&amp;sort=date" class="category">education/teaching</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="49" class="catcheck multi_checkbox"
               data-abb="sls" id="cat_sls"
               checked="checked">
        <a href="/search/sls?query=wordpress&amp;sort=date" class="category">sales</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="14" class="catcheck multi_checkbox"
               data-abb="eng" id="cat_eng"
               checked="checked">
        <a href="/search/eng?query=wordpress&amp;sort=date" class="category">internet engineering</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="47" class="catcheck multi_checkbox"
               data-abb="lgl" id="cat_lgl"
               checked="checked">
        <a href="/search/lgl?query=wordpress&amp;sort=date" class="category">legal/paralegal</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="13" class="catcheck multi_checkbox"
               data-abb="mar" id="cat_mar"
               checked="checked">
        <a href="/search/mar?query=wordpress&amp;sort=date" class="category">marketing/advertising/pr</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="48" class="catcheck multi_checkbox"
               data-abb="egr" id="cat_egr"
               checked="checked">
        <a href="/search/egr?query=wordpress&amp;sort=date" class="category">architect/engineer/cad</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="24" class="catcheck multi_checkbox"
               data-abb="ofc" id="cat_ofc"
               checked="checked">
        <a href="/search/ofc?query=wordpress&amp;sort=date" class="category">admin/office</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="28" class="catcheck multi_checkbox"
               data-abb="npo" id="cat_npo"
               checked="checked">
        <a href="/search/npo?query=wordpress&amp;sort=date" class="category">nonprofit</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="27" class="catcheck multi_checkbox"
               data-abb="ret" id="cat_ret"
               checked="checked">
        <a href="/search/ret?query=wordpress&amp;sort=date" class="category">retail/wholesale</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="128" class="catcheck multi_checkbox"
               data-abb="mnu" id="cat_mnu"
               checked="checked">
        <a href="/search/mnu?query=wordpress&amp;sort=date" class="category">manufacturing</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="15" class="catcheck multi_checkbox"
               data-abb="etc" id="cat_etc"
               checked="checked">
        <a href="/search/etc?query=wordpress&amp;sort=date" class="category">et cetera</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="54" class="catcheck multi_checkbox"
               data-abb="hum" id="cat_hum"
               checked="checked">
        <a href="/search/hum?query=wordpress&amp;sort=date" class="category">human resource</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="129" class="catcheck multi_checkbox"
               data-abb="fbh" id="cat_fbh"
               checked="checked">
        <a href="/search/fbh?query=wordpress&amp;sort=date" class="category">food/beverage/hospitality</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="125" class="catcheck multi_checkbox"
               data-abb="trp" id="cat_trp"
               checked="checked">
        <a href="/search/trp?query=wordpress&amp;sort=date" class="category">transportation</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="61" class="catcheck multi_checkbox"
               data-abb="gov" id="cat_gov"
               checked="checked">
        <a href="/search/gov?query=wordpress&amp;sort=date" class="category">government</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="75" class="catcheck multi_checkbox"
               data-abb="sci" id="cat_sci"
               checked="checked">
        <a href="/search/sci?query=wordpress&amp;sort=date" class="category">science/biotech</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="59" class="catcheck multi_checkbox"
               data-abb="trd" id="cat_trd"
               checked="checked">
        <a href="/search/trd?query=wordpress&amp;sort=date" class="category">skilled trades/artisan</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="12" class="catcheck multi_checkbox"
               data-abb="bus" id="cat_bus"
               checked="checked">
        <a href="/search/bus?query=wordpress&amp;sort=date" class="category">business/mgmt</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="52" class="catcheck multi_checkbox"
               data-abb="tfr" id="cat_tfr"
               checked="checked">
        <a href="/search/tfr?query=wordpress&amp;sort=date" class="category">tv/film/video/radio</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="11" class="catcheck multi_checkbox"
               data-abb="web" id="cat_web"
               checked="checked">
        <a href="/search/web?query=wordpress&amp;sort=date" class="category">web/html/info design</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="23" class="catcheck multi_checkbox"
               data-abb="acc" id="cat_acc"
               checked="checked">
        <a href="/search/acc?query=wordpress&amp;sort=date" class="category">accounting/finance</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="21" class="catcheck multi_checkbox"
               data-abb="sof" id="cat_sof"
               checked="checked">
        <a href="/search/sof?query=wordpress&amp;sort=date" class="category">software/qa/dba/etc</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="131" class="catcheck multi_checkbox"
               data-abb="sec" id="cat_sec"
               checked="checked">
        <a href="/search/sec?query=wordpress&amp;sort=date" class="category">security</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="126" class="catcheck multi_checkbox"
               data-abb="spa" id="cat_spa"
               checked="checked">
        <a href="/search/spa?query=wordpress&amp;sort=date" class="category">salon/spa/fitness</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="16" class="catcheck multi_checkbox"
               data-abb="wri" id="cat_wri"
               checked="checked">
        <a href="/search/wri?query=wordpress&amp;sort=date" class="category">writing/editing</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="127" class="catcheck multi_checkbox"
               data-abb="rej" id="cat_rej"
               checked="checked">
        <a href="/search/rej?query=wordpress&amp;sort=date" class="category">real estate</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="100" class="catcheck multi_checkbox"
               data-abb="csr" id="cat_csr"
               checked="checked">
        <a href="/search/csr?query=wordpress&amp;sort=date" class="category">customer service</a> <span class="count">0</span>
    </li>
    <li>
           <input type="checkbox" name="cat_id"
               value="26" class="catcheck multi_checkbox"
               data-abb="hea" id="cat_hea"
               checked="checked">
        <a href="/search/hea?query=wordpress&amp;sort=date" class="category">healthcare</a> <span class="count">0</span>
    </li>

        <li>
        <div class="selectall js-only checked"><label>
            <input type="checkbox" class="catcheck selectallcb" checked="checked"> 
            <span class="all linklike">select all</span>
        </label></div>
        </li>
</ul>




        </div>
        <input type="hidden" name="userid" value="" />





        <div class="searchgroup">
            <ul>
    <li>
       <label class="srchType">
           <input type="checkbox" name="srchType" class="" value="T" >
           search titles only
       </label>
    </li>
    <li>
       <label class="hasPic">
           <input type="checkbox" name="hasPic" class="autosubmit" value="1" >
           has image
       </label>
    </li>
    <li>
       <label class="postedToday">
           <input type="checkbox" name="postedToday" class="autosubmit" value="1" >
           posted today
       </label>
    </li>
    <li>
       <label class="bundleDuplicates">
           <input type="checkbox" name="bundleDuplicates" class="autosubmit" value="1" >
           bundle duplicates
       </label>
    </li>
    <li>
       <label class="searchNearby">
           <input type="checkbox" name="searchNearby" class="autosubmit" value="1" >
           include nearby areas
       </label>
    </li>
</ul>

                <ul class="js-only nearbyAreas ">
                        <li class="nearbyZone nearbyZone_2">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_17"
                            value="52"
                            
                            disabled="disabled"
                            />
                            boise, ID <small>(boi)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_3">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_22"
                            value="187"
                            
                            disabled="disabled"
                            />
                            chico, CA <small>(chc)</small>
                        </label>
                        </li>
                        <li class="">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_1"
                            value="350"
                            
                            disabled="disabled"
                            />
                            corvallis/albany <small>(crv)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_1">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_8"
                            value="322"
                            
                            disabled="disabled"
                            />
                            east oregon <small>(eor)</small>
                        </label>
                        </li>
                        <li class="">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_0"
                            value="94"
                            
                            disabled="disabled"
                            />
                            eugene, OR <small>(eug)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_3">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_19"
                            value="189"
                            
                            disabled="disabled"
                            />
                            humboldt county <small>(hmb)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_1">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_10"
                            value="324"
                            
                            disabled="disabled"
                            />
                            kennewick-pasco-richland <small>(kpr)</small>
                        </label>
                        </li>
                        <li class="">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_5"
                            value="675"
                            
                            disabled="disabled"
                            />
                            klamath falls, OR <small>(klf)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_3">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_18"
                            value="654"
                            
                            disabled="disabled"
                            />
                            lewiston / clarkston <small>(lws)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_1">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_6"
                            value="216"
                            
                            disabled="disabled"
                            />
                            medford-ashland <small>(mfr)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_2">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_12"
                            value="655"
                            
                            disabled="disabled"
                            />
                            moses lake, WA <small>(mlk)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_3">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_21"
                            value="466"
                            
                            disabled="disabled"
                            />
                            olympic peninsula <small>(olp)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_1">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_7"
                            value="321"
                            
                            disabled="disabled"
                            />
                            oregon coast <small>(cor)</small>
                        </label>
                        </li>
                        <li class="">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_4"
                            value="9"
                            
                            disabled="disabled"
                            />
                            portland, OR <small>(pdx)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_3">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_20"
                            value="368"
                            
                            disabled="disabled"
                            />
                            pullman / moscow <small>(plm)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_2">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_14"
                            value="188"
                            
                            disabled="disabled"
                            />
                            redding, CA <small>(rdd)</small>
                        </label>
                        </li>
                        <li class="">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_3"
                            value="459"
                            
                            disabled="disabled"
                            />
                            roseburg, OR <small>(rbg)</small>
                        </label>
                        </li>
                        <li class="">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_2"
                            value="232"
                            
                            disabled="disabled"
                            />
                            salem, OR <small>(sle)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_2">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_15"
                            value="2"
                            
                            disabled="disabled"
                            />
                            seattle-tacoma <small>(sea)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_1">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_11"
                            value="708"
                            
                            disabled="disabled"
                            />
                            siskiyou county <small>(ssk)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_3">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_23"
                            value="461"
                            
                            disabled="disabled"
                            />
                            skagit / island / SJI <small>(mvw)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_2">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_16"
                            value="707"
                            
                            disabled="disabled"
                            />
                            susanville, CA <small>(ssn)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_2">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_13"
                            value="325"
                            
                            disabled="disabled"
                            />
                            wenatchee, WA <small>(wen)</small>
                        </label>
                        </li>
                        <li class="nearbyZone nearbyZone_1">
                        <label class="nearby">
                            <input
                            type="checkbox"
                            class="use-id nearbyArea"
                            name="nearbyArea"
                            id="nearbyArea_9"
                            value="246"
                            
                            disabled="disabled"
                            />
                            yakima, WA <small>(yak)</small>
                        </label>
                        </li>

                        <li>
                        <span class="nextNearbyZone linklike" data-zone="1">
                            + show <span id="nearbyNumber">24</span> more...
                        </span>
                        </li>
                </ul>
        </div>

            <div class="searchgroup">
                <span class="searchfieldlabel">miles from zip</span>
                <input type="number" max="200" min="0" size="3" inputmode="numeric"
                    class="flatinput searchInput search_distance" placeholder="miles"
                    name="search_distance"
                    value=""
                />
                <input type="text" class="flatinput searchInput postal" placeholder="from zip"
                    size="7" name="postal" value="">
            </div>





        <div class="searchgroup"><label class="is_internship">
        <input type="checkbox" name="is_internship" value="1" class="autosubmit" />
    internship
</label><br />
<label class="is_nonprofit">
        <input type="checkbox" name="is_nonprofit" value="1" class="autosubmit" />
    non-profit
</label><br />
<label class="is_telecommuting">
        <input type="checkbox" name="is_telecommuting" value="1" class="autosubmit" />
    telecommute
</label><br />
</div><div class="searchgroup"><div class="search-attribute " data-attr="employment_type">
    <div class="title linklike ">
        <span class="plus">&#9656;</span><span class="minus">&#9662;</span> employment type
    </div>

        <ul class="list">

            <li class="checkbox ">
                <label>
                    <input id="employment_type_1" name="employment_type" class="multi_checkbox" value="1" type="checkbox"
                     />
                    full-time
                </label>
            </li>
            <li class="checkbox ">
                <label>
                    <input id="employment_type_2" name="employment_type" class="multi_checkbox" value="2" type="checkbox"
                     />
                    part-time
                </label>
            </li>
            <li class="checkbox ">
                <label>
                    <input id="employment_type_3" name="employment_type" class="multi_checkbox" value="3" type="checkbox"
                     />
                    contract
                </label>
            </li>
            <li class="checkbox ">
                <label>
                    <input id="employment_type_4" name="employment_type" class="multi_checkbox" value="4" type="checkbox"
                     />
                    employee's choice
                </label>
            </li>



    </ul>
</div>
</div>

        <div class="searchgroup resetsearch">
            <a href="/search/jjj" title="clear all search parameters" class="reset linklike">reset</a>
            <button type="submit" class="searchlink linklike">update search</button>
        </div>

    </div>
</div>


            <div class="search-legend">
<div class="search-view js-only">
    <div class="dropdown dropdown-icons dropdown-arrows dropdown-view" role="toolbar" aria-label="view options" aria-expanded="false">
        <ul class="dropdown-list">
            <li class="dropdown-item mode sel">
                <button title="show results in a list" data-selection="list" id="listview">
                    <span class="view-list icon"></span>list
                </button>
                <span class="toggle-arrow"></span>
            </li>
            <li class="dropdown-item mode">
                <button title="show results in a list with thumbnail pictures"  data-selection="pic"  id="picview" >
                    <span class="view-thumb icon"></span>thumb
                </button>
                <span class="toggle-arrow"></span>
            </li>
            <li class="dropdown-item mode">
                <button title="show results side-by-side with larger pictures" data-selection="grid" id="gridview">
                    <span class="view-gallery icon"></span>gallery
                </button>
                <span class="toggle-arrow"></span>
            </li>
                <li class="dropdown-item mode">
                    <button title="show results on a map"  data-selection="map"  id="mapview" >
                        <span class="view-map icon"></span>map
                    </button>
                    <span class="toggle-arrow"></span>
                </li>
        </ul>
    </div>
</div>
                <div class="search-sort" >
    <div class="dropdown dropdown-sort dropdown-arrows" data-default-sort="date" role="toolbar" aria-label="sort options" aria-expanded="false">
        <ul class="dropdown-list">

            <li class="dropdown-item mode sel" aria-selected="true">
                <a data-selection="date" title="show newest matches first" href="/search/jjj?sort=date&amp;query=wordpress">newest <span class="toggle-arrow"></span></a>
            </li>
            <li class="dropdown-item mode " aria-selected="false">
                <a data-selection="rel" title="show most relevant matches first" href="/search/jjj?sort=rel&amp;query=wordpress">relevant <span class="toggle-arrow"></span></a>
            </li>

        </ul>
    </div>
</div>

                <div class="paginator buttongroup firstpage lastpage">
    <span class="resulttotal">
        <span class="for-map">
        displaying <span class="displaycountShow">...</span> posting
        </span>
    </span>
    <span class="buttons">
        <a href="/search/jjj?query=wordpress&amp;sort=date" class="button first" title="first page">&lt;&lt;</a>
        <span class="button first" title="first page">&lt;&lt;</span>
        <a href="/search/jjj?query=wordpress&amp;sort=date" class="button prev" title="previous page">&lt; prev</a>
        <span class="button prev" title="previous page">&lt; prev</span>

        <span class="button pagenum">
            <span class="range">
                <span class="rangeFrom">1</span>
                -
                <span class="rangeTo">1</span>
            </span>
            /
            <span class="totalcount">1</span>
        </span>

        <a href="/search/jjj?s=1&amp;query=wordpress&amp;sort=date" class="button next" title="next page">next &gt; </a>
        <span class="button next" title="next page"> next &gt; </span>
    </span>
</div>

                
            </div>
            <div class="content" id="sortable-results" >
                <section class="favlistsection">
                    <section class="favlistinfo">
                    </section>
                    <section class="banishlistinfo">
                    </section>
                </section>

                    

<div class="open-map-view-button">
    <span>see in map view</span>
</div>
<div id="mapcontainer" data-arealat="44.058300" data-arealon="-121.314003">
    <div id="noresult-overlay"></div>
    <div id="noresult-text">
        <span class="message">No mappable items found</span>
    </div>
    <div id="map" class="loading">
        <div class="close-full-screen-map-mode-button">close fullscreen</div>
        <div class="close-map-view-button">close map</div>
    </div>
</div>

                <ul class="rows">
                             <li class="result-row" data-pid="6435271713">

        <a href="https://bend.craigslist.org/med/d/graphic-designer/6435271713.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-22 14:08" title="Fri 22 Dec 02:08:08 PM">Dec 22</time>


        <a href="https://bend.craigslist.org/med/d/graphic-designer/6435271713.html" data-id="6435271713" class="result-title hdrlnk">Graphic Designer</a>


        <span class="result-meta">


                <span class="result-hood"> (Bend)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6435271713">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>

                    <h4 class="ban nearby"><span class="bantext">Few local results found. Here are some from nearby areas. Checking &#39;include nearby areas&#39; will expand your search.</span></h4>

                             <li class="result-row" data-pid="6435093374">

        <a href="https://eugene.craigslist.org/med/d/graphic-designer-creative-lead/6435093374.html" class="result-image gallery" data-ids="1:00707_3H19FR2I2iK">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-22 11:33" title="Fri 22 Dec 11:33:35 AM">Dec 22</time>


        <a href="https://eugene.craigslist.org/med/d/graphic-designer-creative-lead/6435093374.html" data-id="6435093374" class="result-title hdrlnk">Graphic Designer / Creative Lead</a>


        <span class="result-meta">


                <span class="nearby" title="eugene, OR">(eug &gt; Eugene, OR)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6435093374">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6433015154">

        <a href="https://corvallis.craigslist.org/med/d/print-media-designer/6433015154.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-20 15:18" title="Wed 20 Dec 03:18:38 PM">Dec 20</time>


        <a href="https://corvallis.craigslist.org/med/d/print-media-designer/6433015154.html" data-id="6433015154" class="result-title hdrlnk">Print &amp; Media Designer</a>


        <span class="result-meta">


                <span class="nearby" title="corvallis/albany">(crv &gt; Lebanon)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6433015154">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6421695435">

        <a href="https://corvallis.craigslist.org/med/d/project-manager-for/6421695435.html" class="result-image gallery" data-ids="1:00r0r_iVbC8VdOJ0y,1:00G0G_8ERzUo3bw1y,1:00j0j_h0l7eY2BD8P">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-11 14:06" title="Mon 11 Dec 02:06:50 PM">Dec 11</time>


        <a href="https://corvallis.craigslist.org/med/d/project-manager-for/6421695435.html" data-id="6421695435" class="result-title hdrlnk">Project Manager for Branding+Web Firm</a>


        <span class="result-meta">


                <span class="nearby" title="corvallis/albany">(crv &gt; Downtown Corvallis, Oregon)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6421695435">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6421695437">

        <a href="https://corvallis.craigslist.org/mar/d/project-manager-for/6421695437.html" class="result-image gallery" data-ids="1:00r0r_iVbC8VdOJ0y,1:00G0G_8ERzUo3bw1y,1:00j0j_h0l7eY2BD8P">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-11 14:06" title="Mon 11 Dec 02:06:50 PM">Dec 11</time>


        <a href="https://corvallis.craigslist.org/mar/d/project-manager-for/6421695437.html" data-id="6421695437" class="result-title hdrlnk">Project Manager for Branding+Web Firm</a>


        <span class="result-meta">


                <span class="nearby" title="corvallis/albany">(crv &gt; Downtown Corvallis, Oregon)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6421695437">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6421695440">

        <a href="https://corvallis.craigslist.org/web/d/project-manager-for/6421695440.html" class="result-image gallery" data-ids="1:00r0r_iVbC8VdOJ0y,1:00G0G_8ERzUo3bw1y,1:00j0j_h0l7eY2BD8P">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-11 14:06" title="Mon 11 Dec 02:06:50 PM">Dec 11</time>


        <a href="https://corvallis.craigslist.org/web/d/project-manager-for/6421695440.html" data-id="6421695440" class="result-title hdrlnk">Project Manager for Branding+Web Firm</a>


        <span class="result-meta">


                <span class="nearby" title="corvallis/albany">(crv &gt; Downtown Corvallis, Oregon)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6421695440">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6434180773" data-repost-of="6213877937">

        <a href="https://portland.craigslist.org/mlt/web/d/web-project-manager/6434180773.html" class="result-image gallery" data-ids="1:01717_kD4nCQybfNy,1:00n0n_lc6FeZg6lNK,1:01717_hKBLHSVnGuR,1:00101_i5keDfWUAMK">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-21 14:48" title="Thu 21 Dec 02:48:59 PM">Dec 21</time>


        <a href="https://portland.craigslist.org/mlt/web/d/web-project-manager/6434180773.html" data-id="6434180773" class="result-title hdrlnk">Web Project Manager</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Goose Hollow)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6434180773">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6430084100" data-repost-of="6095310696">

        <a href="https://portland.craigslist.org/clk/web/d/entry-level-tech-for-internet/6430084100.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-18 10:30" title="Mon 18 Dec 10:30:25 AM">Dec 18</time>


        <a href="https://portland.craigslist.org/clk/web/d/entry-level-tech-for-internet/6430084100.html" data-id="6430084100" class="result-title hdrlnk">Entry Level Tech for Internet Marketing Company - Starting pay $15/hr</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Vancouver)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6430084100">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6429254041" data-repost-of="6420190824">

        <a href="https://portland.craigslist.org/mlt/wri/d/project-manager/6429254041.html" class="result-image gallery" data-ids="1:00l0l_2zSLUZEBehk">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-17 15:56" title="Sun 17 Dec 03:56:18 PM">Dec 17</time>


        <a href="https://portland.craigslist.org/mlt/wri/d/project-manager/6429254041.html" data-id="6429254041" class="result-title hdrlnk">Project Manager</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; PORTLAND)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6429254041">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6429252584" data-repost-of="6420180972">

        <a href="https://portland.craigslist.org/mlt/bus/d/project-manager/6429252584.html" class="result-image gallery" data-ids="1:00l0l_2zSLUZEBehk">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-17 15:54" title="Sun 17 Dec 03:54:46 PM">Dec 17</time>


        <a href="https://portland.craigslist.org/mlt/bus/d/project-manager/6429252584.html" data-id="6429252584" class="result-title hdrlnk">Project Manager</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Portland)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6429252584">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6427870866" data-repost-of="5600339914">

        <a href="https://portland.craigslist.org/clc/mar/d/marketing-manager-generalist/6427870866.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-16 11:11" title="Sat 16 Dec 11:11:24 AM">Dec 16</time>


        <a href="https://portland.craigslist.org/clc/mar/d/marketing-manager-generalist/6427870866.html" data-id="6427870866" class="result-title hdrlnk">Marketing Manager (Generalist) - Law Firm</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Lake Oswego)</span>

                <span class="result-tags">
                    img
                    <span class="maptag" data-pid="6427870866">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6426617246">

        <a href="https://portland.craigslist.org/mlt/eng/d/experienced-front-end-web/6426617246.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-15 10:54" title="Fri 15 Dec 10:54:53 AM">Dec 15</time>


        <a href="https://portland.craigslist.org/mlt/eng/d/experienced-front-end-web/6426617246.html" data-id="6426617246" class="result-title hdrlnk">Experienced Front-End Web Developer</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Portland)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6426617246">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6426513551" data-repost-of="6095310696">

        <a href="https://portland.craigslist.org/clk/web/d/entry-level-tech-for-internet/6426513551.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-15 09:48" title="Fri 15 Dec 09:48:08 AM">Dec 15</time>


        <a href="https://portland.craigslist.org/clk/web/d/entry-level-tech-for-internet/6426513551.html" data-id="6426513551" class="result-title hdrlnk">Entry Level Tech for Internet Marketing Company - Starting pay $15/hr</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Vancouver)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6426513551">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6425703838" data-repost-of="6095310696">

        <a href="https://portland.craigslist.org/clk/web/d/entry-level-tech-for-internet/6425703838.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-14 15:13" title="Thu 14 Dec 03:13:26 PM">Dec 14</time>


        <a href="https://portland.craigslist.org/clk/web/d/entry-level-tech-for-internet/6425703838.html" data-id="6425703838" class="result-title hdrlnk">Entry Level Tech for Internet Marketing Company - Starting pay $15/hr</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Vancouver)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6425703838">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6425243820" data-repost-of="6095310696">

        <a href="https://portland.craigslist.org/clk/web/d/entry-level-tech-for-internet/6425243820.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-14 09:42" title="Thu 14 Dec 09:42:54 AM">Dec 14</time>


        <a href="https://portland.craigslist.org/clk/web/d/entry-level-tech-for-internet/6425243820.html" data-id="6425243820" class="result-title hdrlnk">Entry Level Tech for Internet Marketing Company - Starting pay $15/hr</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Vancouver)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6425243820">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6424025598" data-repost-of="6095310696">

        <a href="https://portland.craigslist.org/clk/web/d/entry-level-tech-for-internet/6424025598.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-13 10:25" title="Wed 13 Dec 10:25:02 AM">Dec 13</time>


        <a href="https://portland.craigslist.org/clk/web/d/entry-level-tech-for-internet/6424025598.html" data-id="6424025598" class="result-title hdrlnk">Entry Level Tech for Internet Marketing Company - Starting pay $15/hr</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Vancouver)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6424025598">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6423168272" data-repost-of="4012342073">

        <a href="https://portland.craigslist.org/mlt/med/d/production-artist-needed/6423168272.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-12 15:46" title="Tue 12 Dec 03:46:15 PM">Dec 12</time>


        <a href="https://portland.craigslist.org/mlt/med/d/production-artist-needed/6423168272.html" data-id="6423168272" class="result-title hdrlnk">Production Artist Needed</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; NW Portland)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6423168272">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6422694968">

        <a href="https://portland.craigslist.org/mlt/mar/d/jr-digital-marketing/6422694968.html" class="result-image gallery" data-ids="1:00707_lgugmywo3ve">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-12 10:12" title="Tue 12 Dec 10:12:54 AM">Dec 12</time>


        <a href="https://portland.craigslist.org/mlt/mar/d/jr-digital-marketing/6422694968.html" data-id="6422694968" class="result-title hdrlnk">Jr. Digital Marketing Specialist</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6422694968">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6422613445" data-repost-of="6095310696">

        <a href="https://portland.craigslist.org/clk/web/d/entry-level-tech-for-internet/6422613445.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-12 09:23" title="Tue 12 Dec 09:23:49 AM">Dec 12</time>


        <a href="https://portland.craigslist.org/clk/web/d/entry-level-tech-for-internet/6422613445.html" data-id="6422613445" class="result-title hdrlnk">Entry Level Tech for Internet Marketing Company - Starting pay $15/hr</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Vancouver)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6422613445">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6422425451">

        <a href="https://portland.craigslist.org/mlt/ofc/d/executive-assistant/6422425451.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-12 07:24" title="Tue 12 Dec 07:24:12 AM">Dec 12</time>


        <a href="https://portland.craigslist.org/mlt/ofc/d/executive-assistant/6422425451.html" data-id="6422425451" class="result-title hdrlnk">Executive Assistant</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Portland)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6422425451">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6421029629" data-repost-of="5308521507">

        <a href="https://portland.craigslist.org/clk/web/d/full-stack-support-developer/6421029629.html" class="result-image gallery" data-ids="1:00505_6l58wEJGmlL">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-11 07:14" title="Mon 11 Dec 07:14:27 AM">Dec 11</time>


        <a href="https://portland.craigslist.org/clk/web/d/full-stack-support-developer/6421029629.html" data-id="6421029629" class="result-title hdrlnk">Full Stack Support Developer</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Vancouver)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6421029629">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6420190819">

        <a href="https://portland.craigslist.org/mlt/ofc/d/project-manager/6420190819.html" class="result-image gallery" data-ids="1:00l0l_2zSLUZEBehk">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-10 11:55" title="Sun 10 Dec 11:55:15 AM">Dec 10</time>


        <a href="https://portland.craigslist.org/mlt/ofc/d/project-manager/6420190819.html" data-id="6420190819" class="result-title hdrlnk">Project Manager</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; PORTLAND)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6420190819">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6420190821">

        <a href="https://portland.craigslist.org/mlt/mar/d/project-manager/6420190821.html" class="result-image gallery" data-ids="1:00l0l_2zSLUZEBehk">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-10 11:55" title="Sun 10 Dec 11:55:15 AM">Dec 10</time>


        <a href="https://portland.craigslist.org/mlt/mar/d/project-manager/6420190821.html" data-id="6420190821" class="result-title hdrlnk">Project Manager</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; PORTLAND)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6420190821">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6420190824">

        <a href="https://portland.craigslist.org/mlt/wri/d/project-manager/6420190824.html" class="result-image gallery" data-ids="1:00l0l_2zSLUZEBehk">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-10 11:55" title="Sun 10 Dec 11:55:15 AM">Dec 10</time>


        <a href="https://portland.craigslist.org/mlt/wri/d/project-manager/6420190824.html" data-id="6420190824" class="result-title hdrlnk">Project Manager</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; PORTLAND)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6420190824">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6420180972">

        <a href="https://portland.craigslist.org/mlt/bus/d/project-manager/6420180972.html" class="result-image gallery" data-ids="1:00l0l_2zSLUZEBehk">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-10 11:47" title="Sun 10 Dec 11:47:27 AM">Dec 10</time>


        <a href="https://portland.craigslist.org/mlt/bus/d/project-manager/6420180972.html" data-id="6420180972" class="result-title hdrlnk">Project Manager</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Portland)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6420180972">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6418161345">

        <a href="https://portland.craigslist.org/clk/mar/d/proofer/6418161345.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-08 16:51" title="Fri 08 Dec 04:51:55 PM">Dec  8</time>


        <a href="https://portland.craigslist.org/clk/mar/d/proofer/6418161345.html" data-id="6418161345" class="result-title hdrlnk">Proofer</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Vancouver)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6418161345">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6413588873">

        <a href="https://portland.craigslist.org/mlt/web/d/jr-web-designer/6413588873.html" class="result-image gallery" data-ids="1:00606_ivSaSluPoYB">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-12-05 10:15" title="Tue 05 Dec 10:15:18 AM">Dec  5</time>


        <a href="https://portland.craigslist.org/mlt/web/d/jr-web-designer/6413588873.html" data-id="6413588873" class="result-title hdrlnk">Jr. Web Designer</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6413588873">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6404803072">

        <a href="https://portland.craigslist.org/mlt/ofc/d/office-administrator-mrg/6404803072.html" class="result-image gallery" data-ids="1:01616_eLc6fqJGYS0">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-11-28 16:44" title="Tue 28 Nov 04:44:41 PM">Nov 28</time>


        <a href="https://portland.craigslist.org/mlt/ofc/d/office-administrator-mrg/6404803072.html" data-id="6404803072" class="result-title hdrlnk">Office Administrator - MRG Foundation</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Portland)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6404803072">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6404719304" data-repost-of="5818119047">

        <a href="https://portland.craigslist.org/wsc/mar/d/tech-marketing-engineer/6404719304.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-11-28 15:33" title="Tue 28 Nov 03:33:08 PM">Nov 28</time>


        <a href="https://portland.craigslist.org/wsc/mar/d/tech-marketing-engineer/6404719304.html" data-id="6404719304" class="result-title hdrlnk">Tech Marketing Engineer</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Tigard, OR)</span>

                <span class="result-tags">
                    <span class="maptag" data-pid="6404719304">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6402716545">

        <a href="https://portland.craigslist.org/wsc/mar/d/seo-specialist-commerce-full/6402716545.html" class="result-image gallery empty"></a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-11-27 09:30" title="Mon 27 Nov 09:30:36 AM">Nov 27</time>


        <a href="https://portland.craigslist.org/wsc/mar/d/seo-specialist-commerce-full/6402716545.html" data-id="6402716545" class="result-title hdrlnk">**SEO Specialist (E-commerce) - Full-Time **</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx)</span>

                <span class="result-tags">
                    img
                    <span class="maptag" data-pid="6402716545">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6398821233" data-repost-of="6279376944">

        <a href="https://portland.craigslist.org/wsc/tch/d/web-hosting-technical-support/6398821233.html" class="result-image gallery" data-ids="1:00j0j_fljmvlAYIRP">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-11-24 08:13" title="Fri 24 Nov 08:13:03 AM">Nov 24</time>


        <a href="https://portland.craigslist.org/wsc/tch/d/web-hosting-technical-support/6398821233.html" data-id="6398821233" class="result-title hdrlnk">Web Hosting Technical Support</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Virginia Beach)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6398821233">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>
         <li class="result-row" data-pid="6397166825" data-repost-of="6213877937">

        <a href="https://portland.craigslist.org/mlt/web/d/web-project-manager/6397166825.html" class="result-image gallery" data-ids="1:01717_kD4nCQybfNy,1:00n0n_lc6FeZg6lNK,1:01717_hKBLHSVnGuR,1:00101_i5keDfWUAMK">
        </a>

    <p class="result-info">
        <span class="icon icon-star" role="button">
            <span class="screen-reader-text">favorite this post</span>
        </span>

            <time class="result-date" datetime="2017-11-22 11:36" title="Wed 22 Nov 11:36:14 AM">Nov 22</time>


        <a href="https://portland.craigslist.org/mlt/web/d/web-project-manager/6397166825.html" data-id="6397166825" class="result-title hdrlnk">Web Project Manager</a>


        <span class="result-meta">


                <span class="nearby" title="portland, OR">(pdx &gt; Goose Hollow)</span>

                <span class="result-tags">
                    pic
                    <span class="maptag" data-pid="6397166825">map</span>
                </span>

                <span class="banish icon icon-trash" role="button">
                    <span class="screen-reader-text">hide this posting</span>
                </span>

            <span class="unbanish icon icon-trash red" role="button" aria-hidden="true"></span>
            <a href="#" class="restore-link">
                <span class="restore-narrow-text">restore</span>
                <span class="restore-wide-text">restore this posting</span>
            </a>

        </span>
    </p>
</li>

                </ul>
            </div>

            <div class="search-legend bottom">
                <div class="search-view">
                    <span class="buttongroup"><a class="backtotop button" href="#page-top">^ back to top</a></span>
                </div>
                <div class="search-sort">
                    <span class="buttongroup"><a class="backtotop button" href="#page-top">^ back to top</a></span>
                </div>
                <div class="paginator buttongroup firstpage lastpage">
    <span class="resulttotal">
        <span class="for-map">
        displaying <span class="displaycountShow">...</span> posting
        </span>
    </span>
    <span class="buttons">
        <a href="/search/jjj?query=wordpress&amp;sort=date" class="button first" title="first page">&lt;&lt;</a>
        <span class="button first" title="first page">&lt;&lt;</span>
        <a href="/search/jjj?query=wordpress&amp;sort=date" class="button prev" title="previous page">&lt; prev</a>
        <span class="button prev" title="previous page">&lt; prev</span>

        <span class="button pagenum">
            <span class="range">
                <span class="rangeFrom">1</span>
                -
                <span class="rangeTo">1</span>
            </span>
            /
            <span class="totalcount">1</span>
        </span>

        <a href="/search/jjj?s=1&amp;query=wordpress&amp;sort=date" class="button next" title="next page">next &gt; </a>
        <span class="button next" title="next page"> next &gt; </span>
    </span>
</div>

            </div>

            <section class="blurbs">
                
            </section>

            <div id="floater">
                <img class="loading" src="//www.craigslist.org/images/animated-spinny.gif" alt="">
                <img class="payload" src="//www.craigslist.org/images/animated-spinny.gif" alt="">
            </div>
        </form>


<div class="slidemessage">
    <span class="fave">
        <span class="star"></span>
        favorited
    </span>
    <span class="unfave">
        <span class="star"></span>
        no longer favorited
    </span>
    <span class="hide">
        <span class="trash"></span>
        hidden
    </span>
    <span class="unhide">
        <span class="trash"></span>
        no longer hidden
    </span>
</div>

<footer>
        <span class="rss">
            <a class="l" href="https://bend.craigslist.org/search/jjj?format=rss&amp;query=wordpress&amp;sort=date">RSS</a>
            <a href="https://www.craigslist.org/about/rss">(?)</a><br>
        </span>
    <ul class="clfooter">
        <li>&copy;  <span class="desktop">craigslist</span><span class="mobile">CL</span></li>
        <li><a href="https://www.craigslist.org/about/help/">help</a></li>
        <li><a href="https://www.craigslist.org/about/scams">safety</a></li>
        <li class="desktop"><a href="https://www.craigslist.org/about/privacy.policy">privacy</a></li>
        <li class="desktop"><a href="https://forums.craigslist.org/?forumID=8">feedback</a></li>
        <li class="desktop"><a href="https://www.craigslist.org/about/craigslist_is_hiring">cl jobs</a></li>
        <li><a href="//www.craigslist.org/about/terms.of.use.en">terms</a></li>
        <li><a href="https://www.craigslist.org/about/">about</a></li>
        <li class="fsel desktop linklike" data-mode="mobile">mobile</li>
        <li class="fsel mobile linklike" data-mode="regular">desktop</li>
    </ul>
</footer>
    </section>

    <template id="gallerycarousel">
        <div class="slider-info"></div><div class="slider-back arrow">&lt;</div><div class="slider-forward arrow">&gt;</div>
    </template>

    <script src="//www.craigslist.org/js/general-concat.min.js?v=ec75caad3953678a82856bd9c30fbc7b" type="text/javascript" ></script>

    <script type="text/javascript"><!--
        var iframe = document.createElement('iframe');
        iframe.style.display = 'none';
        iframe.src = '//www.' + CL.url.baseDomain + '/static/localstorage.html?v=51a29e41f8e978141e4085ed4a77d170';
        document.body.insertBefore(iframe, null);
    --></script>
<script type="text/template" id="clustertemplate">
    <li class="posting {visited}" data-pid="{PostingID}">
        <img src="{ImageThumb}">
        <div class="housing_bubble_banner">
            <span class="{hasPrice}price">{currencySymbol}{Ask}</span>
            <span class="bedrooms">{BedroomsContent}</span>
            <span class="postingtitle"><a>{PostingTitle}</a></span>
            <span class="js-only map-banish-unbanish" data-pid="{PostingID}">
                <span class="banish">
                    <span class="icon icon-trash" role="button"></span>
                    <span class="screen-reader-text">hide this posting</span>
                </span>
                <span class="unbanish">
                    <span class="icon icon-trash red" role="button"></span>
                    unhide
                </span>
            </span>
        </div>
    </li>
</script>
<script type="text/template" id="postingtemplate">
    <div class="viewcontainer pics loading">
        <div class="backtolist">
            &laquo; back to posting list
        </div>
        <div class="title">
            <span class="icon icon-star" data-pid="{PostingID}" role="button">
                <span class="screen-reader-text">favorite this post</span>
            </span>
            <span class="postingtitle">
                <a href="{PostingURL}" target="_blank">{PostingTitle}</a>
            </span>
            <div>
                <span class="{hasPrice}price">{currencySymbol}{Ask}</span>
                <span class="bedrooms">{BedroomsContent}</span>
                <span class="js-only map-banish-unbanish" data-pid="{PostingID}">
                    <span class="banish">
                        <span class="icon icon-trash" role="button"></span>
                        <span class="screen-reader-text">hide this posting</span>
                    </span>
                    <span class="unbanish">
                        <span class="icon icon-trash red" role="button"></span>
                        <span class="screen-reader-text">unhide</span>
                        unhide
                    </span>
                </span>
            </div>
        </div>
        <hr style="clear:both">
        <div class="picscontainer gallery">
            <span class="slider-back arrow">&lt;</span><span class="slider-info"></span><span class="slider-forward arrow">&gt;</span>
            <div class="swipe">
                <div class="swipe-wrap">
                    <img class="loading" src="//www.craigslist.org/images/animated-spinny.gif" alt="">
                </div>
            </div>
        </div>
        <div class="infocontainer"></div>
        <hr style="clear:both">
        <div class="timecontainer"></div>
        <a class="viewpostinglink" href="{PostingURL}" target="_blank">view posting</a>
        <div class="contenttoggle">
            <a class="moreinfo">more info</a>
            <a class="showpics">show images</a>
        </div>
    </div>
</script>
<script type="text/template" id="popuptemplate">
    <div id="mapbubble" class="posting">
        <ul id="clusterbubble"></ul>
        <div id="postbubble"></div>
    </div>
</script>
<script src="//www.craigslist.org/js/leaflet-concat.min.js?v=a9f1795ce805dee064746ef4aed8688e" type="text/javascript" ></script>

    <script src="//www.craigslist.org/js/search-concat.min.js?v=e1c64faba8e53cad9fbf05400b65c34d" type="text/javascript" ></script>

    <script src="//www.craigslist.org/js/postings-concat.min.js?v=d8b823a95cd8884132f3d94de4165b61" type="text/javascript" ></script>

</body>
</html>
HTMLcUrlDump;
    
}
