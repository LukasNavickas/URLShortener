<?php 

//======================================================================
// Makes and gets the URL, onnects to the database
//======================================================================

class MakeShorter {

	protected $db;

	public function __construct() {
		$this->db = new mysqli('localhost', 'lukis_url', 'url', 'lukis_url');
	}

	    public function makeCode($url){
        $url = trim($url);

        if(!filter_var($url, FILTER_VALIDATE_URL)) {
            return '';
        }

        $url = $this->db->escape_string($url);

        //Check if URL already exists
        $same = $this->db->query("SELECT code FROM urls WHERE url ='{$url}'");

        if($same->num_rows){
            return $same->fetch_object()->code;
        } else {

        //Insert record without a code
        $insert = $this->db->query("INSERT INTO urls (url, creation) VALUES ('{$url}', NOW())");

        // Generate code based on id
        $code = $this->createCode($this->db->insert_id);

        //Update Record
        $this->db->query("UPDATE urls SET code = '{$code}' WHERE url = '$url'");

        return $code;
        }
    }

	protected function createCode($num){
        return base_convert($num, 10, 36);
    }

    public function getUrl($code){
    	$code = $this->db->escape_string($code);

    	$code = $this->db->query("SELECT url FROM urls WHERE code = '$code'");

    	// if the value is found, we return url
    	if($code->num_rows) {
    		return $code->fetch_object()->url;
    	}
    }
}

?>