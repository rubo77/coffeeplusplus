<?
//http://www.michel-kraemer.de/anti-spam-phpbb3
//
//configure your http:BL Access Key here
$httpblkey = "kgutqzdqdock"; // bekommt man hier: http://www.projecthoneypot.org/httpbl_configure.php
$httpblmaxdays = 99999;
$httpblmaxthreat = 20; /*Threat Rating	IP that is as threatening as one that has sent
						  20	12 spam messages
						  25	100 spam messages
						  50	10,000 spam messages
						  75	1,000,000 spam messages*/
 
//if you already configured a honey pot on your website use this line:
//$httpblhoneypot = "http://xxxxxxxxxxx";
 
function httpbl_check() {
  global $httpblkey, $httpblmaxdays, $httpblmaxthreat, $httpblhoneypot;
 
// var_dump( $_SERVER["REMOTE_ADDR"]);
  $ip = $_SERVER["REMOTE_ADDR"];
  # bad example
   #$ip='94.142.131.18'; // last 2010-06-29
   #$ip='124.236.241.68'; // last 2008 This IP has not seen any suspicious activity within the last 3 months. This IP is most likely clean and trustworthy now. (This record will remain public for historical purposes, however.)
   #$ip='88.200.247.156'; // only 12 bad event  | SC  	Bad Event  	12  	 2008-01-24   	 2010-06-30 
 
  $request_domain=$httpblkey."."
    .implode(".", array_reverse(explode(".", $ip)))
    .".dnsbl.httpbl.org";
// echo $request_domain;die;
  $result = explode(".", gethostbyname($request_domain));
  $result['IP']=$ip;
  $result['request_domain']=$request_domain;
  $result['link']='http://www.projecthoneypot.org/ip_'.$ip;
  $days = $result[1];
  $threat = $result[2];
  $result['Threat Rating']=$threat;
  $result['Spider Last Seen']=$days;
  $result['allowed Rating']=$httpblmaxthreat;
  $result['allowed days']=$httpblmaxdays;
  if ($result[0] != 127) {
    //something went wrong or the IP is not in the database.
    //ignore this one.
    return array('RESULT'=>'GOOD', 'INFO'=>$result);;
  }
 
  
  if ($days < $httpblmaxdays && $threat > $httpblmaxthreat) {
    if ($httpblhoneypot) {
      header("HTTP/1.1 301 Moved Permanently");
      header("Location: ".$httpblhoneypot);
    }
    return array('RESULT'=>'BAD', 'INFO'=>$result);
    die();
  }
  return array('RESULT'=>'GOOD', 'REVOKED'=>'GOOD since '."$days days, Threat Rating: $threat", 'INFO'=>$result);
}
#echo '<pre>';var_dump(httpbl_check());