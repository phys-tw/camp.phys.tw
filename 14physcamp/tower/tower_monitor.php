<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<title>Monitor Tower Status</title>
	<link rel="stylesheet" type="text/css" href="set_tower.css" />
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="expires" content="0">
	<script type="text/javascript">
		function getData()
		{
			if (!!window.EventSource) {
				var source = new EventSource('update.php');
			}
			else
			{
				alert('Oops! no SSE!!!');
			}
			source.addEventListener('message', function(e) {
				var data=e.data.split(";");
				//alert(123);
				var data_n=parseInt(data[0]);
				info(data_n,data);
			}, false);
		}
		function info(data_n,data)
		{
			var i;
			data_n=parseInt(data);
			for(i=7;i>=1;i--)
			{
				stat=data_n%10;
				data_n=Math.floor(data_n/10);
				owner=data_n%10;
				data_n=Math.floor(data_n/10);
				document.getElementById('o'+i).selectedIndex=owner;
				document.getElementById('s'+i).selectedIndex=stat;
				document.getElementById('t'+i).innerHTML=data[i];
			}
			
		}
		function loadXMLDoc(mode,myfun)
		{
			var fn;
			fn=mode+'.txt';
			var xmlhttp;
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				//alert(xmlhttp.readyState);
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
			    {
			    	myfun(xmlhttp.responseText);
			    }
			};
			xmlhttp.open("GET",fn,true);
			xmlhttp.send();
		}
		function switch_team(tower_no)
		{
			var i;
			var fn;
			fn='set.php?';
			for(i=1;i<=7;i++)
			{
				fn=fn+'o'+i+'=';
				if(tower_no==i)
				{
					fn=fn+((document.getElementById('o'+i).selectedIndex+1)%2)+'&';
				}
				else
				{
					fn=fn+document.getElementById('o'+i).selectedIndex+'&';
				}
				fn=fn+'s'+i+'=';
				fn=fn+document.getElementById('s'+i).selectedIndex+'&';
			}
			var xmlhttp;
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){};
			xmlhttp.open("GET",fn,true);
			xmlhttp.send();
		}
		function switch_stat(tower_no)
		{
			var i;
			var fn;
			fn='set.php?';
			for(i=1;i<=7;i++)
			{
				fn=fn+'o'+i+'=';
				fn=fn+document.getElementById('o'+i).selectedIndex+'&';
				fn=fn+'s'+i+'=';
				if(tower_no==i)
				{
					fn=fn+((document.getElementById('s'+i).selectedIndex+1)%2)+'&';
					if((document.getElementById('s'+i).selectedIndex+1)%2)
					{
						resettime(i,1);
					}
					else
					{
						resettime(i,0);
					}
				}
				else
				{
					fn=fn+document.getElementById('s'+i).selectedIndex+'&';
				}
			}
			var xmlhttp;
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){};
			xmlhttp.open("GET",fn,true);
			xmlhttp.send();
		}
		function resettime(i,s)
		{
			var xmlhttp2;
			xmlhttp2=new XMLHttpRequest();
			xmlhttp2.onreadystatechange=function(){};
			xmlhttp2.open("GET",'set_time.php?t='+i+'&'+'s='+s,true);
			xmlhttp2.send();
		}
		function resett(i)
		{
			resettime(i,document.getElementById('s'+i).selectedIndex);
		}
	</script>
</head>
<body onload="getData()">
	<form action="set.php" method="get">
		<div style="width:100%;float:left;margin:5px;">
			<input type="button" style="border:2px outset black;padding:5px;float:left;" value="Refresh Data" />
		</div>
		<div class="item">
			<h2 class="menu_h">Tower I:</h2>
			<div class="menu">
				<span class="m_s">owner:</span>
				<select id="o1" name="o1" disabled="disabled" class="val">
					<option value="0">Team A</option>
					<option value="1">Team B</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_team(1)" />
				<br />
				<span class="m_s">status:</span>
				<select id="s1" name="s1" disabled="disabled" class="val">
					<option value="0">Safe</option>
					<option value="1">Under Attack</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_stat(1)" />
				<br />
				<span class="m_s">timer:</span>
				<span id="t1" class="val">xxx</span>
				<input type="button" class="but" value="reset" onclick="resett(1)" />
			</div>
		</div>
		<div class="item">
			<h2 class="menu_h">Tower II:</h2>
			<div class="menu">
				<span class="m_s">owner:</span>
				<select id="o2" name="o2" disabled="disabled" class="val">
					<option value="0">Team A</option>
					<option value="1">Team B</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_team(2)" />
				<br />
				<span class="m_s">status:</span>
				<select id="s2" name="s2" disabled="disabled" class="val">
					<option value="0">Safe</option>
					<option value="1">Under Attack</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_stat(2)" />
				<br />
				<span class="m_s">timer:</span>
				<span id="t2" class="val">xxx</span>
				<input type="button" class="but" value="reset" onclick="resett(2)" />
			</div>
		</div>
		<div class="item">
			<h2 class="menu_h">Tower III:</h2>
			<div class="menu">
				<span class="m_s">owner:</span>
				<select id="o3" name="o3" disabled="disabled" class="val">
					<option value="0">Team A</option>
					<option value="1">Team B</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_team(3)" />
				<br />
				<span class="m_s">status:</span>
				<select id="s3" name="s3" disabled="disabled" class="val">
					<option value="0">Safe</option>
					<option value="1">Under Attack</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_stat(3)" />
				<br />
				<span class="m_s">timer:</span>
				<span id="t3" class="val">xxx</span>
				<input type="button" class="but" value="reset" onclick="resett(3)" />
			</div>
		</div>
		<div class="item">
			<h2 class="menu_h">Tower IV:</h2>
			<div class="menu">
				<span class="m_s">owner:</span>
				<select id="o4" name="o4" disabled="disabled" class="val">
					<option value="0">Team A</option>
					<option value="1">Team B</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_team(4)" />
				<br />
				<span class="m_s">status:</span>
				<select id="s4" name="s4" disabled="disabled" class="val">
					<option value="0">Safe</option>
					<option value="1">Under Attack</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_stat(4)" />
				<br />
				<span class="m_s">timer:</span>
				<span id="t4" class="val">xxx</span>
				<input type="button" class="but" value="reset" onclick="resett(4)" />
			</div>
		</div>
		<div class="item">
			<h2 class="menu_h">Tower V:</h2>
			<div class="menu">
				<span class="m_s">owner:</span>
				<select id="o5" name="o5" disabled="disabled" class="val">
					<option value="0">Team A</option>
					<option value="1">Team B</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_team(5)" />
				<br />
				<span class="m_s">status:</span>
				<select id="s5" name="s5" disabled="disabled" class="val">
					<option value="0">Safe</option>
					<option value="1">Under Attack</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_stat(5)" />
				<br />
				<span class="m_s">timer:</span>
				<span id="t5" class="val">xxx</span>
				<input type="button" class="but" value="reset" onclick="resett(5)" />
			</div>
		</div>
		<div class="item">
			<h2 class="menu_h">Tower VI:</h2>
			<div class="menu">
				<span class="m_s">owner:</span>
				<select id="o6" name="o6" disabled="disabled" class="val">
					<option value="0">Team A</option>
					<option value="1">Team B</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_team(6)" />
				<br />
				<span class="m_s">status:</span>
				<select id="s6" name="s6" disabled="disabled" class="val">
					<option value="0">Safe</option>
					<option value="1">Under Attack</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_stat(6)" />
				<br />
				<span class="m_s">timer:</span>
				<span id="t6" class="val">xxx</span>
				<input type="button" class="but" value="reset" onclick="resett(6)" />
			</div>
		</div>
		<div class="item">
			<h2 class="menu_h">Tower VII:</h2>
			<div class="menu">
				<span class="m_s">owner:</span>
				<select id="o7" name="o7" disabled="disabled" class="val">
					<option value="0">Team A</option>
					<option value="1">Team B</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_team(7)" />
				<br />
				<span class="m_s">status:</span>
				<select id="s7" name="s7" disabled="disabled" class="val">
					<option value="0">Safe</option>
					<option value="1">Under Attack</option>
				</select>
				<input type="button" class="but" value="switch" onclick="switch_stat(7)" />
				<br />
				<span class="m_s">timer:</span>
				<span id="t7" class="val">xxx</span>
				<input type="button" class="but" value="reset" onclick="resett(7)" />
			</div>
		</div>
		</form>

</body>
</html>