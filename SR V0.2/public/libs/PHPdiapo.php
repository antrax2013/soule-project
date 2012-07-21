<?php
/*
http://code.revolunet.com/PHPdiapo/FR
<OWNER> = revolunet
<ORGANIZATION> = revolunet - Julien Bouquillon
<YEAR> = 2008

Copyright (c) 2008, revolunet
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met :


 Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer. 
 Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution. 
 Neither the name of the <ORGANIZATION> nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission. 
THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES ; LOSS OF USE, DATA, OR PROFITS ; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.



use it as you like, but at your own risks ;)
*/

class PHPDiapo {
	var $relPath;
	var $images;
	var $id;
	var $className;
	var $transition_time=3;
	var $transition_pause;
	
	function PHPDiapo ($path,$id,$className="",$timeout=3) {
		$this->relPath = $path;
		$this->id = $id;
		$this->className = $className;
		if ($timeout) $this->transition_pause = $timeout;
		$this->init();
		$this->write();
		}
	
	function write() {
		$this->write_func();
		$first=$this->images[0];
		$this->write_JS_init();
		echo $this->img($first,$id=$this->id,$className=$this->className);
		$this->write_JS_launch();
	} 
	
	function write_JS_init() {
		echo "\r\r<script type=\"text/javascript\">\r";
		echo  "images['".$this->id."']=new Array();\r";
		for ($i=0;$i<sizeof($this->images);$i++) {
			echo  "images['".$this->id."'][$i]=new Image();\r";
			echo  "images['".$this->id."'][$i].src=\"".$this->images[$i]."\";\r";
			echo  "images['".$this->id."'][$i].alt=\"".$this->get_alt($this->images[$i])."\";\r";
		}
		echo "</script>\r\r";
	}
	
	
	function write_func(){
		static $already_write = false;
		if (!$already_write)
		{
			echo "\r<script type=\"text/javascript\">\r";
			
			echo "
			if (navigator.appName == 'Microsoft Internet Explorer') ie = true;
			else ie = false;
			
			var FRAME_PER_SEC = 20;
			function moz_fade_in(imageId)
			{
				var img = document.getElementById(imageId);
				var incr = 1/((img.transition_time/3)*FRAME_PER_SEC);
				var newOp = parseFloat(img.style.MozOpacity)+parseFloat(incr);
				newOp = (newOp > 1) ? 1 : newOp;
				img.style.MozOpacity = newOp;
				if (newOp < 1) setTimeout('moz_fade_in(\"'+imageId+'\")',1000/FRAME_PER_SEC);
			}\r";
	
			echo "var images = new Array();\r";
			echo "function run_diapo(diapoId) {\r";
			echo "obj = document.getElementById(diapoId);";
			echo "obj.src = images[diapoId][obj.index].src;\r";
			echo "obj.alt = images[diapoId][obj.index].alt;\r";
			echo "obj.title = images[diapoId][obj.index].alt;\r";
			echo "if (document.all){\r";
				echo "obj.style.filter=\"blendTrans(duration=obj.transition_time)\";\r";
				echo "obj.filters.blendTrans.Apply();\r";
				echo "obj.filters.blendTrans.Play();\r";
			echo "}\r";
			echo "else {\r";
			echo "obj.style.MozOpacity = 0;";
			echo "moz_fade_in(diapoId);";
			echo "}\r";
			echo "obj.index+=1;\r";
			echo "if (obj.index > (obj.length_diapo-1)) obj.index=0;\r";
			echo "obj.timeout = setTimeout('run_diapo(\"'+diapoId+'\")', obj.transition_pause * 1000);\r";
			echo "}\r";
			echo "</script>\r\r";
			$already_write = true;
		}
	}
	
	function write_JS_launch() {
		$diapoID=$this->id;
		echo "\r<script type=\"text/javascript\">\r";
		echo "obj = document.getElementById('".$diapoID."');\r";
		echo "obj.transition_time=".$this->transition_time.";\r";
		echo "obj.transition_pause=".$this->transition_pause.";\r";
		echo "obj.index=0;\r";
		echo "obj.length_diapo=images['".$diapoID."'].length;\r";
		echo "obj.timeout;\r";
		
		echo "if (obj.length_diapo > 0) run_diapo('".$diapoID."');\r";
		echo "</script>\r\r";
	}
	
	function get_alt($src) {
		#  strip path
		$txt=substr($src,strrpos($src,"/")+1);
		# strip extension
		$txt=substr($txt,0,strrpos($txt,"."));
		# strip special chars
		$tostrip=array("_",",","-");
		for ($i=0;$i<sizeof($tostrip);$i++) $txt=str_replace($tostrip[$i]," ",$txt);
		return $txt;
	}
	
	function img($src,$id="",$class="") {
		$alt=$this->get_alt($src);
		return "<img id='$id'  name='$id' class='$class' alt='$alt' title='$alt' src='$src'/>\r";
	}
	
	function init() {
		$this->images=array();
		$dir = $_SERVER["PATH_TRANSLATED"];
		$dir = substr($dir,0,strrpos($dir,"/")+1);
		$dir .= $this->relPath;
		$path = opendir($dir);
		
		while (false !== ($file = readdir($path))) {
		       if($file!="." && $file!="..") {
			   // check file extension
			   $pattern = '/\.(gif|png|jpg|jpeg)$/i';
			   if (!preg_match($pattern, $file, $matches)) continue;

			   if(is_file($dir."/".$file))
			       $this->images[]="$this->relPath/$file";
		       }
		}
			
	}

 }