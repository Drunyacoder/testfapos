<?php//include_once dirname(dirname(dirname(__FILE__))) . '/inc/home.php';include_once dirname(dirname(dirname(__FILE__))) . '/boot.php';class Bannerx {	private $pldir;	private $plcdir;	public function __construct($params = array()) {		$this->pldir = dirname(__FILE__);		$this->plcdir = trim(strrchr($this->pldir, DS), DS);	}			public function common($params = array()) {		$out = $this->showBanner();					if (empty($out)) $out = array('content' => 'Баннера нет');				$Viewer = new Fps_Viewer_Manager();		$out = $Viewer->parseTemplate($params, $out);		return $out;	}			public function showBanner() {		$history_file = $this->pldir . '/db.dat';		if (!file_exists($history_file)) return false;						$out = '';		$data = unserialize(file_get_contents($history_file));						if (!empty($data) && is_array($data)) {									// so simple ...			if (count($data) == 1) {				$out = '<img src="' . $data0[0]['url'] .'" title="' . $data0[0]['title'] .'" alt="' . $data0[0]['title'] .'" />';				return $out;			}							// but ...			// function for rotate our banners			$out .= '<div style="position:relative;">' . "\n"				. ' <img src="' . $data0[0]['url'] .'" title="' . h($data0[0]['title']) 				.'" alt="' . h($data0[0]['title']) .'" style="position:absolute;top:0;left:0;" />' . "\n" 				. '<img src="' . $data0[1]['url'] .'" title="' . h($data0[1]['title']) 				.'" alt="' . h($data0[1]['title']) .'" style="position:absolute;top:0;left:0;opacity:0;" />' . "\n"				. '</div>' . "\n"				. '<script type="text/javascript">				function rotate(id, next_id){					var data = \'' . json_encode($data) . '\';					$("#"+id).animate({						left:-150,						opacity:0					}, function(){											});					$("#"+next_id).animate({						opacity:1					});				}				</script>' . "\n";		}	}	}