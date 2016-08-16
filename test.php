<!DOCTYPE html>
<html>
<head>
	<title>bet365 - 体育投注,娱乐场,扑克牌,彩票游戏</title>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="keywords" content="bet365,体育投注,娱乐场,扑克牌,彩票游戏" />
	<meta name="description" content="“bet365”作为世界领先的网络博彩集团之一，我们提供最丰富的滚球盘服务，精彩投注体育比赛，我们提供超过50,000场的现场赛事投注。请立刻开始体育投注，加入我们的娱乐场、扑克牌及游戏。" />
	<link rel="stylesheet" type="text/css" href="css/global.css" />
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script src="js/global.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/tab.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>

<div class="header-nav">
	<div class="top-nav">
		<div class="logo"></div>
		<div class="top-menu">
			<ul>
				<li><a class="" href="/">首页</a></li>
				<li class="nav-sports"><a class="cur" href="sports.php">体育投注</a></li>
                <li class="nav-ele"><a class="" href="sports.php?rtype=re">滚球盘</a></li>
				<li class="nav-live"><a class="" href="/mc.php?model=ag">娱乐场</a></li>
				<!--<li class="nav-ele"><a href="desk.php">电子游戏</a></li>-->
				<li><a class="cur" href="/mc.php?model=lottery" style="background:none;border:none" >彩票</a></li>
					<li><a href="/gall-games.php" style="border:none">电子游艺</a></li>



				<li><a href="activity.php">促销</a></li>
				<li><a href="/mc.php?model=reg">加入我们</a></li>
			</ul>
		</div>
        		<form action="login.php" method="post" name="LoginForm" onSubmit="return loginCheck(this);" >
			<div class="login-frm">
				<div class="l">
					<div class="login-ipt"><label id="username_focus">会员帐号</label><input type="text" value="" name="username" class="txt-box" /></div>
					<div class="login-ipt"><label>会员密码</label><input type="password" value="" name="password" class="txt-box" /></div>
					<p>
						<a class="reg" href="/mc.php?model=reg">立即注册</a>
						<a class="get-pwd" href="/mc.php?model=getpwd">忘记密码?</a>
						<a class="favorite" href="javascript:void(0)" onclick="AddFavorite('http://'+window.location.host,document.title)">收藏本站</a>
					</p>
				</div>
				<div class="r"><input type="submit" value="登入" class="submit-btn" /></div>
			</div>
		</form>
    	</div>
	<dl>
		<dt>
       		<span id="ESTReciprocal">2016/08/15 04:47:30</span>
		<!-- 	<span>2016/08/15 04:47:30</span> -->
			<strong>公告：</strong>
			<marquee onmouseover="this.stop()" onmouseout="this.start()" scrollAmount="3" scrollDelay="80">
				尊敬的客户们，您们好，公司娱乐场将于8月22日至8月26日举办AG赌神赛，豪送千万奖金，欢迎点击娱乐场公告下方的赌神赛进行查阅相关活动规则。谢谢			</marquee>
		</dt>
		<dd>
			<div><a class="msg" href="javascript:onlineService();"  style="color:#ffc810">在线咨询</a></div>
			<div>
				<span>语言</span>
				<a class="lan" href="javascript:" id="language">简体中文</a>

			</div>
			<div>
				<a class="ser" href="javascript:">服务</a>
				<ul id="serviceList">
					<li><a href="/mc.php?model=contactus">联系我们</a></li>
					<li><a href="/mc.php?model=help">帮助</a></li>
					<li><a href="/mc.php?model=responsibility">博彩责任</a></li>
					<li><a href="/mc.php?model=bank">银行</a></li>
				</ul>
			</div>
			<div><a href="/mc.php?model=lines">备用网址</a></div>
		</dd>
	</dl>

</div>
<script>
function  get_other_ioratio(odd_type, iorH, iorC , showior){
	var out=new Array();
	if(iorH!="" ||iorC!=""){
		out =chg_ior(odd_type,iorH,iorC,showior);
	}else{
		out[0]=iorH;
		out[1]=iorC;
	}
	return out;
}

function chg_ior(odd_f,iorH,iorC,showior){
	var ior=new Array();
	if(iorH < 11) iorH *=1000;
	if(iorC < 11) iorC *=1000;
	iorH=parseFloat(iorH);
	iorC=parseFloat(iorC);
	switch(odd_f){
	case "H":
		ior = get_HK_ior(iorH,iorC);
		break;
	case "M":
		ior = get_MA_ior(iorH,iorC);
		break;
	case "I" :
		ior = get_IND_ior(iorH,iorC);
		break;
	case "E":
		ior = get_EU_ior(iorH,iorC);
		break;
	default:
		ior[0]=iorH ;
		ior[1]=iorC ;
	}

	ior[0]/=1000;
	ior[1]/=1000;

	ior[0]=printf(Decimal_point(ior[0],showior),iorpoints);
	ior[1]=printf(Decimal_point(ior[1],showior),iorpoints);
	return ior;
}

function get_HK_ior( H_ratio, C_ratio){
	var out_ior=new Array();
	var line,lowRatio,nowRatio,highRatio;
	var nowType="";
	if (H_ratio <= 1000 && C_ratio <= 1000){
		out_ior[0]=H_ratio;
		out_ior[1]=C_ratio;
		return out_ior;
	}
	line=2000 - ( H_ratio + C_ratio );
	if (H_ratio > C_ratio){
		lowRatio=C_ratio;
		nowType = "C";
	}else{
		lowRatio = H_ratio;
		nowType = "H";
	}
	if (((2000 - line) - lowRatio) > 1000){
		nowRatio = (lowRatio + line) * (-1);
	}else{
		nowRatio=(2000 - line) - lowRatio;
	}
	if (nowRatio < 0){
		highRatio = Math.floor(Math.abs(1000 / nowRatio) * 1000) ;
	}else{
		highRatio = (2000 - line - nowRatio) ;
	}
	if (nowType == "H"){
		out_ior[0]=lowRatio;
		out_ior[1]=highRatio;
	}else{
		out_ior[0]=highRatio;
		out_ior[1]=lowRatio;
	}
	return out_ior;
}

function get_MA_ior( H_ratio, C_ratio){
	var out_ior=new Array();
	var line,lowRatio,highRatio;
	var nowType="";
	if ((H_ratio <= 1000 && C_ratio <= 1000)){
		out_ior[0]=H_ratio;
		out_ior[1]=C_ratio;
		return out_ior;
	}
	line=2000 - ( H_ratio + C_ratio );
	if (H_ratio > C_ratio){
		lowRatio = C_ratio;
		nowType = "C";
	}else{
		lowRatio = H_ratio;
		nowType = "H";
	}
	highRatio = (lowRatio + line) * (-1);
	if (nowType == "H"){
		out_ior[0]=lowRatio;
		out_ior[1]=highRatio;
	}else{
		out_ior[0]=highRatio;
		out_ior[1]=lowRatio;
	}
	return out_ior;
}

function get_IND_ior( H_ratio, C_ratio){
	var out_ior=new Array();
	out_ior = get_HK_ior(H_ratio,C_ratio);
	H_ratio=out_ior[0];
	C_ratio=out_ior[1];
	H_ratio /= 1000;
	C_ratio /= 1000;
	if(H_ratio < 1){
		H_ratio=(-1) / H_ratio;
	}
	if(C_ratio < 1){
		C_ratio=(-1) / C_ratio;
	}
	out_ior[0]=H_ratio*1000;
	out_ior[1]=C_ratio*1000;
	return out_ior;
}

function get_EU_ior(H_ratio, C_ratio){
	var out_ior=new Array();
	out_ior = get_HK_ior(H_ratio,C_ratio);
	H_ratio=out_ior[0];
	C_ratio=out_ior[1];
	out_ior[0]=H_ratio+1000;
	out_ior[1]=C_ratio+1000;
	return out_ior;
}

function Decimal_point(tmpior,show){
	var sign="";
	sign =((tmpior < 0)?"Y":"N");
	tmpior = (Math.floor(Math.abs(tmpior) * show + 1 / show )) / show;
	return (tmpior * ((sign =="Y")? -1:1)) ;
}

function printf(vals,points){
	vals=""+vals;
	var cmd=new Array();
	cmd=vals.split(".");
	if (cmd.length>1){
		for (ii=0;ii<(points-cmd[1].length);ii++)vals=vals+"0";
	}else{
		vals=vals+".";
		for (ii=0;ii<points;ii++)vals=vals+"0";
	}
	return vals;
}
</script>
<script>
var unix=1471250850;
GetRTime();
</script>
	<div class="sports-nav" style="width:100%">
    <iframe id="sprots_id" src="/app/member/FT_index.php?uid=test00" frameborder="0" width="100%" height="755"></iframe>
	</div>
	<div class="foot-warp">
	<div class="foot-cont">
		<div>
			<h1>关于我们</h1>
			<h4>开户注册</h4>
			<p>　　注册bet365账户即可享受我们高品质、高赔率的娱乐游戏及所有线上投注的优惠。我们致力于提供全球客户最有价值的游戏体验、各项优惠服务。</p>
			<h4>合作伙伴</h4>
			<p>　　今天开始加入bet365的合作伙伴计划。通过介绍新客户加入bet365，您每月将有丰厚的佣金回报。</p>
			<h4>责任博彩</h4>
			<p>　　我们对“小赌怡情、适可而止”的宗旨非常重视。我们希望我们的顾客在投注时得到娱乐，但也希望赌博不会影响到他们的财政状况和生活。</p>
			<h4>安全保密</h4>
			<p>　　您的信息保密性对我们来说是最重要的，而且我们将坚持实行严格保密和隐私制度。bet365提供128位SSL加密传输与MD5加密密码，在最大程度上保障用户信息的安全于您的信息保密度至关重要。我们将坚持实行隐私严格保密制度。</p>
		</div>
		<div>
			<h1 class="t2">全线产品</h1>
			<h4>体育博彩</h4>
			<p>　　我们提供您喜爱的体育赛事。如足球五大联赛、世界杯、欧洲冠军杯、NBA、WNBA、NFL、MLB、NCAA以及四大网球公开赛、排球等。除了体育赛事以外，我们也提供其它博彩娱乐项目。</p>
			<h4>电玩彩票</h4>
			<p>　　MG游戏包括老虎机、电动扑克、大型电玩、桌上游戏、以及90年代经典老虎机产品、还有最新潮开发的3D老虎机等电子类游戏。此外您更有机会赢得游戏提供的四层神秘累积彩金。福利彩票游戏有上海时时乐、重庆时时彩、江西时时彩、广东十分彩、北京快乐8、香港六合彩等彩票游戏。</p>
			<h4>真人娱乐</h4>
			<p>　　bet365四大平台LEBO视讯、BBIN视讯、MG欧美视讯、CT视讯等，赌场内最容易上手的游戏《百家乐、二十一》、最需要运气的《骰宝游戏》，规则最简单的《龙虎斗》、最紧张刺激的《轮盘游戏》等真人娱乐游戏。</p>
		</div>
		<div>
			<h1 class="t3">信息中心</h1>
			<h4>优惠活动</h4>
			<p>　　新用户可享有首次存款红利、老客户同样享有多种优惠服务、以及每月更新的各种优惠福利。</p>
			<h4>帮助中心</h4>
			<p>　　您可以通过常见问题栏目获得开户、实力等其他问题，您亦可以通过存款帮助、提款帮助了解到存取款遇到的问题。</p>
			<h4>支付方式</h4>
			<p>　　bet365为客户提供众多的存取款方式并保障您存取过程顺利和及时，出款专员7×24小时轮流出款，让您的资金安全快捷到账。</p>
			<h4>联络我们</h4>
			<p>　　如果您有任何关于体育及娱乐场的疑问，可通过在线客服、邮件、微信与我们取得联系。bet365以服务会员不打烊的精神，24小时处理会员出入款相关事宜，令我们骄傲的客服团队，亲切又专业，解决玩家对于网站、游戏的种种疑难问题，让每位玩家有宾至如归的感觉。</p>
		</div>
		<div>
			<h1 class="t4">投注资料</h1>
			<h4>赛果</h4>
			<p>　　全球每一场体育赛事完场后，您可进入bet365网站内，查阅所有体育赛事的赛果。</p>
			<h4>数据统计</h4>
			<p>　　作为国际专业的网上博彩游戏客户端运营企业，每一数据均有主管负责监察，以确保游戏的真实度。并作24小时的后台检测和监控，确保玩家的切身利益。提供最快捷、最精准、最全面的体育资讯，包括超过200场主要赛事的、赛程、停赛、球队，及时比分助您作出正确的选择。</p>
			<h4>博彩规则</h4>
			<p>　　所有会员在bet365的投注都需要遵从本公司开户协议和协议与规则中的条款。请务必详细查阅！</p>
			<h4>娱乐场博彩</h4>
			<p>　　我们的真人娱乐场提供限额查询、即时彩池、结果查询及路纸查看。您所需的所有信息将显示在荧幕上，以便您精准分析进行更有效的投注。</p>
		</div>
	</div>
	<div class="foot-line"></div>
	<dl class="foot-logo">
		<dt><img src="images/80x19-logo.gif" /></dt>
		<dd><img src="images/30x35-gt-Casino2.gif" /><img src="images/thawte-1x.gif" /><img src="images/gamcare-1x.gif" /><img src="images/gov-gibraltar-1x.gif" /><img src="images/18-1x.gif" /></dd>
	</dl>
	<div class="foot-add">
		注册公司地址:Hillside (直布罗陀) 有限公司, Unit 1.1, First Floor, Waterport Place, 2 Europort Avenue, Gibraltar.
		<br />Hillside (直布罗陀) 有限公司 由直布罗陀执照局颁发执照，并受直布罗陀博彩委员会监管。
		<p>
			通过进入、继续使用或浏览此网站，您即被认定接受：我们将使用特定的浏览器cookies优化您的客户享用体验。bet365仅会使用优化您服务体验的cookies，
			<br />而不是可侵犯您隐私的cookies。关于我们使用cookies，以及您如何取消、管理cookies使用的更多详情，请参考我们的Cookies政策。
		</p>
	</div>
	<div class="foot-nav">
		<a href="/mc.php?model=about">关于我们</a>|<a href='/mc.php?model=legal'>隐私政策</a>|<a href="/mc.php?model=rule">条款与规则</a>|<a href="/mc.php?model=agent">申请合作</a>|<a href="/mc.php?model=pay">公平赔付</a>|<a href="/mc.php?model=cookies">Cookies政策</a>
		<div>
    	<span>2001-2014 bet365 版权所有</span><a class="back-home" href="/">返回首页</a>
    </div>
	</div>
</div></body>
</html>