<?php
class Album
{
	//data
	//=============
	//name
	//ID
	//isEnabled
	//pic_count
	//vid_count
	//visitor_count

	//date_record
	//date_upload
	//date_update
	//banner_source
	//cover_source
	//emoji
	//description
	//mediaList

	//country
	//region
	//city
	//hood
	//trip
	//tags
	//other_albums

	//constructor
	//loads data in from a given album name
	function __construct($album_name){
		$needsExport = false;

		$data = readJsonSettings($album_name, "data");
		$this->description = $data['description'];//displayAlbumDescription($album_name);

		$this->name = $album_name;
		$this->ID = $data['id'];
		$this->isEnabled = $data['is_enabled'];
		if(empty($this->isEnabled))
			$this->isEnabled = "false";//defaults to not enabled, for new albums

		$this->date_record = $data['date_record'];
		if(empty($this->date_record))
			$this->date_record = getFirstPictureDate($album_name);

		$this->getMediaCount($album_name, $data);//gets pic and vid count
		$this->visitor_count = getVistors($album_name);

		$this->emoji = $data['emoji'];

		$this->country = $data['country'];
		$this->region = $data['region'];
		$this->city = $data['city'];
		$this->hood = $data['hood'];
		$this->trip = $data['trip'];

		//TODO: tags needs to be broken up into array
		//TODO: related_albums needs to be broken up into array

		//save if any data needed creation
		if($needsExport)
			$this->export();

		//print_r($this);
	}

	//how would I make an alt ctor in PHP???
	/*public AlbumFromID($album_id){
		$album_name = getAlbumFromID($album_id);
		return Album($album_id);
	}*/

	//re-saves any changes made, to respective data files
	public function export(){

		$data['id'] = $this->ID;
		$data['is_enabled'] = $this->isEnabled;
		$data['date_record'] = $this->date_record;

		$data['description'] = $this->description;

		 $data['country'] = $this->country;
		 $data['region'] = $this->region;
		 $data['city'] = $this->city;
		 $data['hood'] = $this->hood;
		 $data['trip'] = $this->trip;

		saveJsonSettings($this->name, "data", $data);
	}

	public function getMediaCount($album_name, $data, $forceUpdate = false){
		$pic = $data['pic_count'];
		$vid = $data['vid_count'];

		//if the values need to be computed
		if($pic =="" || $vid == "" || $forceUpdate){
			$folder = getAlbumFolder($album_name);
			$files = scandir($folder) or die("Unable to find images");

			$picResult = array();
			$vidResult = array();

			$pic_extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
			$vid_extensions = array('mp4', 'mpg', 'mpeg', 'mov', 'm4v', 'avi');
			foreach($files as $file){
				$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
				if (in_array($ext, $pic_extensions)) 
	            	array_push($picResult, $file);
	            if (in_array($ext, $vid_extensions)) 
	            	array_push($vidResult, $file);
			}

			$pic = count($picResult);
			$vid = count($vidResult);
		}

		$this->pic_count = $pic;
		$this->vid_count = $vid;
	}
}

//move get album identifier to here

//how to do needs export check?

//how can I fix redundant code with get media count and get album images?
//make get album images a member function?
//linked list of all content?

//move get and count visitor into here

//move display ablum description into here

//move get cover location to here
//and remove the related creation code from gallery
?>