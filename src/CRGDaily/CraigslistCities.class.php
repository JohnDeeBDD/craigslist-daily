<?php

namespace CRGDaily;

class CraigslistCities{
	
	public $lastCity;
	
	public $listOfSitePrefixes = array("start", "auburn", "abilene", "akroncanton", "albany", "albanyga", "albuquerque", "allentown", "altoona", "amarillo", "ames", "anchorage", "annapolis", "annarbor", "appleton", "asheville", "ashtabula", "athensga", "athensohio", "atlanta", "augusta", "austin", "bakersfield", "baltimore", "batonrouge", "battlecreek", "beaumont", "bellingham", "bemidji", "bend", "bgky", "bham", "bigbend", "billings", "binghamton", "bismarck", "blacksburg", "bn", "boise", "boone", "boston", "boulder", "bozeman", "brainerd", "brownsville", "brunswick", "buffalo", "burlington", "butte", "capecod", "carbondale", "catskills", "cedarrapids", "cenla", "centralmich", "cfl", "chambana", "chambersburg", "charleston", "charlestonwv", "charlotte", "charlottesville", "chattanooga", "chautauqua", "chicago", "chico", "chillicothe", "cincinnati", "clarksville", "cleveland", "clovis", "cnj", "collegestation", "columbia", "columbiamo", "columbus", "columbusga", "cookeville", "corpuschristi", "corvallis", "cosprings", "csd", "dallas", "danville", "dayton", "daytona", "decatur", "delaware", "delrio", "denver", "desmoines", "detroit", "dothan", "dubuque", "duluth", "eastco", "easternshore", "eastidaho", "eastky", "eastnc", "eastoregon", "easttexas", "eauclaire", "elko", "elmira", "elpaso", "enid", "erie", "eugene", "fairbanks", "fargo", "farmington", "fayar", "fayetteville", "fingerlakes", "flagstaff", "flint", "florencesc", "fortcollins", "fortdodge", "fortmyers", "fortsmith", "frederick", "fredericksburg", "fresno", "gadsden", "gainesville", "galveston", "glensfalls", "goldcountry", "grandforks", "grandisland", "grandrapids", "greatfalls", "greenbay", "greensboro", "greenville", "gulfport", "hanford", "harrisburg", "harrisonburg", "hartford", "hattiesburg", "helena", "hickory", "hiltonhead", "holland", "honolulu", "houma", "houston", "hudsonvalley", "humboldt", "huntington", "huntsville", "imperial", "inlandempire", "iowacity", "ithaca", "jackson", "jacksontn", "jacksonville", "janesville", "jerseyshore", "jonesboro", "joplin", "juneau", "jxn", "kalamazoo", "kalispell", "kansascity", "kenai", "keys", "killeen", "kirksville", "klamath", "knoxville", "kpr", "ksu", "lacrosse", "lafayette", "lakecharles", "lakecity", "lakeland", "lancaster", "lansing", "laredo", "lasalle", "lascruces", "lasvegas", "lawrence", "lawton", "lewiston", "lexington", "limaohio", "lincoln", "littlerock", "logan", "longisland", "losangeles", "louisville", "loz", "lubbock", "lynchburg", "macon", "madison", "maine", "mankato", "mansfield", "marshall", "martinsburg", "masoncity", "mattoon", "mcallen", "meadville", "medford", "memphis", "mendocino", "merced", "meridian", "miami", "micronesia", "milwaukee", "minneapolis", "missoula", "mobile", "modesto", "mohave", "monroe", "monroemi", "montana", "monterey", "montgomery", "morgantown", "moseslake", "muskegon", "myrtlebeach", "nacogdoches", "nashville", "natchez", "nd", "nesd", "newhaven", "newjersey", "newlondon", "neworleans", "newyork", "nh", "nmi", "norfolk", "northernwi", "northmiss", "northplatte", "nwct", "nwga", "nwks", "ocala", "odessa", "ogden", "okaloosa", "oklahomacity", "olympic", "omaha", "oneonta", "onslow", "orangecounty", "oregoncoast", "orlando", "ottumwa", "outerbanks", "owensboro", "palmsprings", "panamacity", "parkersburg", "pennstate", "pensacola", "peoria", "philadelphia", "phoenix", "pittsburgh", "plattsburgh", "poconos", "porthuron", "portland", "potsdam", "prescott", "providence", "provo", "pueblo", "puertorico", "pullman", "quadcities", "quincy", "racine", "raleigh", "rapidcity", "reading", "redding", "reno", "richmond", "rmn", "roanoke", "rochester", "rockford", "rockies", "roseburg", "roswell", "sacramento", "saginaw", "salem", "salina", "saltlakecity", "sanangelo", "sanantonio", "sandiego", "sandusky", "sanmarcos", "santabarbara", "santafe", "santamaria", "sarasota", "savannah", "scottsbluff", "scranton", "sd", "seattle", "seks", "semo", "sfbay", "sheboygan", "shoals", "showlow", "shreveport", "sierravista", "siouxcity", "siouxfalls", "siskiyou", "skagit", "slo", "smd", "southbend", "southcoast", "southjersey", "spacecoast", "spokane", "springfield", "springfieldil", "statesboro", "staugustine", "stcloud", "stgeorge", "stillwater", "stjoseph", "stlouis", "stockton", "susanville", "swks", "swmi", "swv", "swva", "syracuse", "tallahassee", "tampa", "texarkana", "texoma", "thumb", "toledo", "topeka", "treasure", "tricities", "tucson", "tulsa", "tuscaloosa", "tuscarawas", "twinfalls", "twintiers", "up", "utica", "valdosta", "ventura", "victoriatx", "visalia", "waco", "washingtondc", "waterloo", "watertown", "wausau", "wenatchee", "westernmass", "westky", "westmd", "westslope", "wheeling", "wichita", "wichitafalls", "williamsport", "wilmington", "winchester", "winstonsalem", "worcester", "wv", "wyoming", "yakima", "york", "youngstown", "yubasutter", "yuma", "zanesville");
	
    //public function __construct() {}
    
    public function checkForCityOptionAndSetIfEmpty(){
    	if (!get_option('crg-daily-city')) {
    		$firtItem = $first_value = reset($this->listOfSitePrefixes);
    		add_option('crg-daily-city', $firtItem);
    	}
    }
    
    public function returnCityArrayKey(){
    	$city = get_option('crg-daily-city');
    	$array = $this->listOfSitePrefixes;
    	$key = array_search($city, $array);
    	return $key;
    }
    
    public function setNumberOfCitiesOption(){
    	//sets the total number of cities:
    	$array = $this->listOfSitePrefixes;
    	$numberOfCities = count($array);
    	update_option('crg-total-number-of-cities', $numberOfCities);
    }
    
    public function fastForwardNextCity(){
    	$next = $this->getNextCityName();
    	
    	//A-B test:
    	update_option('crg-daily-city', $next);
    	//update_option('crg-daily-city', 'yuma');
    }
    
    public function getNextCityName() {
        $current = get_option('crg-daily-city');
        $sites = $this->listOfSitePrefixes;
        $nextkey = array_search($current, $sites) + 1;
        if ($nextkey == count($sites)) {
            // reached end of array, reset:
            $nextkey = 0;
        }
        $next = $sites[$nextkey];
        return $next;
    }

    public function isLastCity(){
    		$lastCity = array_pop($this->listOfSitePrefixes);
    		if (get_option('crg-daily-city') == $lastCity){return TRUE;}else{return FALSE;}
    }
    
    public function returnKeyOfCity($needle){
    	$listOfSitePrefixes = $this->listOfSitePrefixes;
		$x = 0;
		foreach ($listOfSitePrefixes as $haystack){
			if($needle == $haystack){
				return $x;
			}
			$x = $x + 1;
		}
		return false;
    }
    
    public function returnTotalNumberOfCities(){
    	$array = $this->listOfSitePrefixes;
    	$numberOfCities= count($array);
    	return $numberOfCities;
    }
    

}