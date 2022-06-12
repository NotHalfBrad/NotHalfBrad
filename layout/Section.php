<?php

class Section
{
	public $name;
	public $icon;
	public $icon_color;
	public $bar_color;

	function __construct($siteSection = "home")
	{
		switch($siteSection)
		{
			case "home":
			case "index":
				$this->name = "Home";
				$this->icon = "house";
				$this->icon_color = "rgba(255,20,20,1);";
				break;
			case "gamedev":
				$this->name = "GameDev";
				$this->icon = "space_invader";
				$this->icon_color = "rgba(50,50,255,1);";
				break;
			case "photography":
			case "photo":
			case "camera":
			case "cam":
				$this->name = "Photography";
				$this->icon = "camera";
				$this->icon_color = "rgba(255,100,0,1);";
				break;
			case "philosophy":
				$this->name = "Philosophy";
				$this->icon = "scroll";
				$this->icon_color = "rgba(200,200,200,1);";
				break;
			case "contact":
			case "about":
				$this->name = "About";
				$this->icon = "speaking_head_in_silhouette";
				$this->icon_color ="rgba(200,200,200,1);";
				break;
			default:
				$this->name = "ERROR";
				$this->icon = "warning";
				$this->icon_color = "rgba(255,0,0,1);";
				break;
		}
	}

	function getIconTag($otherClass = "", $otherStyles = "")
	{
		//echo '<i class="em em-'.$icon.' '.$otherClass.'" style="filter: grayscale(100%); color: '.$color.' '.$otherStyles.'"></i>';
		return '<i class="em em-'.$this->icon.' '.$otherClass.'" style="'.$otherStyles.' "></i>';
	}

}
?>