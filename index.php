<?php

define("TOKEN", "weixin");

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress 数据库的名称 */
define('DB_NAME', 'app_mallschooltest');

/** MySQL 数据库用户名 */
define('DB_USER', 'wowlw4j31n');

/** MySQL 数据库密码 */
define('DB_PASSWORD', '5zj50l3zwj1wyyiwi01y5hhm5hkm4wywzm04ww12');

/** MySQL 主机 */
define('DB_HOST', 'w.rdc.sae.sina.com.cn:3307');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

$wechatObj = new wechatCallbackapiTest();
tarceHttp();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}

class Express {
    /*
	 * 获取对应名称和对应传值的方法
	 */
    private function expressname($name){
        $expresses=array (
            "aae" => "AAE快递",
            "anjie" => "安捷快递",
            "anneng" => "安能物流",
            "aoshuo" => "奥硕物流",
            "aramex" => "Aramex国际快递",
            "baiqian" => "百千诚国际物流",
            "balunzhi" => "巴伦支",
            "baotongda" => "宝通达",
            "benteng" => "成都奔腾国际快递",
            "changtong" => "长通物流",
            "chengguang" => "程光快递",
            "chengji" => "城际快递",
            "chengshi100" => "城市100",
            "chuanxi" => "传喜快递",
            "chuanzhi" => "传志快递",
            "chukouyi" => "出口易物流",
            "citylink" => "CityLinkExpress",
            "coe" => "东方快递",
            "coscon" => "中国远洋运输(COSCON)",
            "cszx" => "城市之星",
            "dada" => "大达物流",
            "dajin" => "大金物流",
            "datian" => "大田物流",
            "dayang" => "大洋物流快递",
            "debang" => "德邦物流",
            "dechuang" => "德创物流",
            "dhl" => "DHL快递",
            "diantong" => "店通快递",
            "disifang" => "递四方速递",
            "dpex" => "DPEX快递",
            "dsu" => "D速快递",
            "ees" => "百福东方物流",
            "ems" => "EMS快递",
            "eyoubao" => "E邮宝",
            "fanyu" => "凡宇快递",
            "fardar" => "Fardar",
            "fedex" => "国际Fedex",
            "fedexcn" => "Fedex国内",
            "feibao" => "飞豹快递",
            "feihang" => "原飞航物流",
            "feihu" => "飞狐快递",
            "feite" => "飞特物流",
            "feiyuan" => "飞远物流",
            "fengda" => "丰达快递",
            "fkd" => "飞康达快递",
            "gaotie" => "高铁快递",
            "gdyz" => "广东邮政物流",
            "gnxb" => "邮政国内小包",
            "gongsuda" => "共速达物流|快递",
            "guanda" => "冠达快递",
            "guotong" => "国通快递",
            "haihong" => "山东海红快递",
            "haolaiyun" => "好来运快递",
            "haosheng" => "昊盛物流",
            "hebeijianhua" => "河北建华快递",
            "henglu" => "恒路物流",
            "huacheng" => "华诚物流",
            "huahan" => "华翰物流",
            "huahang" => "华航快递",
            "huangmajia" => "黄马甲快递",
            "huaqi" => "华企快递",
            "huayu" => "天地华宇物流",
            "huitong" => "汇通快递",
            "hutong" => "户通物流",
            "hwhq" => "海外环球快递",
            "jiaji" => "佳吉快运",
            "jiayi" => "佳怡物流",
            "jiayu" => "佳宇物流",
            "jiayunmei" => "加运美快递",
            "jiete" => "捷特快递",
            "jinda" => "金大物流",
            "jingdong" => "京东快递",
            "jingguang" => "京广快递",
            "jinyue" => "晋越快递",
            "jiuyi" => "久易快递",
            "jixianda" => "急先达物流",
            "jldt" => "嘉里大通物流",
            "kangli" => "康力物流",
            "kcs" => "顺鑫(KCS)快递",
            "kuaijie" => "快捷快递",
            "kuaiyouda" => "快优达速递",
            "kuanrong" => "宽容物流",
            "kuayue" => "跨越快递",
            "lanhu" => "蓝弧快递",
            "lejiedi" => "乐捷递快递",
            "lianhaotong" => "联昊通快递",
            "lijisong" => "成都立即送快递",
            "lindao" => "上海林道货运",
            "longbang" => "龙邦快递",
            "menduimen" => "门对门快递",
            "minbang" => "民邦快递",
            "mingliang" => "明亮物流",
            "minsheng" => "闽盛快递",
            "nell" => "尼尔快递",
            "nengda" => "港中能达快递",
            "nsf" => "新顺丰（NSF）快递",
            "ocs" => "OCS快递",
            "peixing" => "陪行物流",
            "pinganda" => "平安达",
            "pingyou" => "中国邮政平邮",
            "quanchen" => "全晨快递",
            "quanfeng" => "全峰快递",
            "quanritong" => "全日通快递",
            "quanyi" => "全一快递",
            "ririshun" => "日日顺物流",
            "riyu" => "日昱物流",
            "rpx" => "RPX保时达",
            "rufeng" => "如风达快递",
            "saiaodi" => "赛澳递",
            "santai" => "三态速递",
            "scs" => "伟邦(SCS)快递",
            "shengan" => "圣安物流",
            "shengbang" => "晟邦物流",
            "shengfeng" => "盛丰物流",
            "shenghui" => "盛辉物流",
            "shentong" => "申通快递（可能存在延迟）",
            "shiyun" => "世运快递",
            "shunfeng" => "顺丰快递",
            "suchengzhaipei" => "速呈宅配",
            "suijia" => "穗佳物流",
            "sure" => "速尔快递",
            "tiantian" => "天天快递",
            "tnt" => "TNT快递",
            "tongzhishu" => "高考录取通知书",
            "ucs" => "合众速递",
            "ups" => "UPS快递",
            "usps" => "USPS快递",
            "wanbo" => "万博快递",
            "weitepai" => "微特派",
            "xianglong" => "祥龙运通快递",
            "xinbang" => "新邦物流",
            "xinfeng" => "信丰快递",
            "xingchengzhaipei" => "星程宅配快递",
            "xiyoute" => "希优特快递",
            "yad" => "源安达快递",
            "yafeng" => "亚风快递",
            "yibang" => "一邦快递",
            "yinjie" => "银捷快递",
            "yishunhang" => "亿顺航快递",
            "yousu" => "优速快递",
            "ytfh" => "北京一统飞鸿快递",
            "yuancheng" => "远成物流",
            "yuantong" => "圆通快递",
            "yuefeng" => "越丰快递",
            "yuhong" => "宇宏物流",
            "yumeijie" => "誉美捷快递",
            "yunda" => "韵达快递",
            "yuntong" => "运通中港快递",
            "zengyi" => "增益快递",
            "zhaijisong" => "宅急送快递",
            "zhengzhoujianhua" => "郑州建华快递",
            "zhima" => "芝麻开门快递",
            "zhongtian" => "济南中天万运",
            "zhongtie" => "中铁快运",
            "zhongtong" => "中通快递",
            "zhongxinda" => "忠信达快递",
            "zhongyou" => "中邮物流",
        );
        foreach($expresses as $key => $value){
            if(strstr($value,$name))
                return $key;
        }
        return "error";
    }

	public  function getorder($name,$order){

		$keywords = $this->expressname($name);

        if($keywords == "error")
        {
            return "\"传入了错误的快递公司名称\"";
        }
        $result = file_get_contents("http://apix.sinaapp.com/express/?appkey=zhaoziyitest&company=".$keywords."&number=".$order);
        return $result;
	}
}

class wechatCallbackapiTest
{
    public function test_mysql()
    {
        $ret ="数据表test中的值:";
        $con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
        if (!$con)
        {
            return 'Could not connect: ' . mysql_error();
        }
        
        mysql_select_db(DB_NAME, $con);

        $result = mysql_query("SELECT * FROM test");
        
        while($row = mysql_fetch_array($result))
        {
            $ret = $ret ."\n[ key ]:" . $row['key'] . "     [value]:" . $row['value'];
        }
        
        mysql_close($con);
        return $ret;
    }
    
    public function get_staff_info($value)
    {
        $ret ="查找到的letsgo队员:";
        
        // return iconv('GB2312', 'UTF-8', $value);
        $con = mysql_connect("s2.qycn.cn:3306","qydb2c7e_f","19880425");
        if (!$con)
        {
            return 'Could not connect: ' . mysql_error();
        }
		
		mysql_query("SET NAMES 'utf8'");
		
        mysql_select_db("qydb2c7e", $con);

        $str = "SELECT * FROM letsgo_staff WHERE  `staffId` = " . $value ;

        $result = mysql_query($str);
        
        while($row = mysql_fetch_array($result))
        {
            $ret = $ret ."\n工号:".$row['staffId'] . "\n姓名:" . $row['name'] . "\n手机:" . $row['telephone'] . "\n邮箱:" . $row['email'];
        }
        
        mysql_close($con);
        return $ret;
    }
    
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
    
    private function get_jock(){
        $url = "http://apix.sinaapp.com/joke/?appkey=zhaoziyitest";
        $output = file_get_contents($url);
        return json_decode($output, true);
    }
    
    public function get_kuaidi($company,$order)
    {
        $a = new Express();
        $result = $a->getorder($company,$order);
        return json_decode($result, true);
    }
    
    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $event = trim($postObj->Event);
            $time = time();
			logger("fromUsername:".$fromUsername."    toUsername:".$toUsername."    keyword:".$keyword);
            $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                            </xml>";
            $News2 = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[news]]></MsgType>
                            <ArticleCount>2</ArticleCount>
                            <Articles>
                            <item>
                            <Title><![CDATA[%s]]></Title> 
                            <Description><![CDATA[%s]]></Description>
                            <PicUrl><![CDATA[%s]]></PicUrl>
                            <Url><![CDATA[%s]]></Url>
                            </item>
                            <item>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <PicUrl><![CDATA[%s]]></PicUrl>
                            <Url><![CDATA[%s]]></Url>
                            </item>
                            </Articles>
                            </xml> ";
            if($event =="subscribe")
            {
                $msgType = "text";
                $contentStr = "感谢您关注我的测试账号，发送任意内容开始测试";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            else if($keyword == "?" || $keyword == "？")
            {
                $msgType = "text";
                $contentStr = date("Y-m-d H:i:s",time());
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            else if($keyword == "api")
            {
                $msgType = "text";
                $contentStr = $this->test_mysql();
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            else if($keyword == "joke")
            {
                $msgType = "text";
                $contentStr = $this->get_jock();
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            else if(strncasecmp("letsgo",$keyword,6) == 0)
            {
                $value = substr($keyword,6);
                $msgType = "text";
                $contentStr = $this->get_staff_info($value);
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            else if(strncasecmp("快递",$keyword,2) == 0)
            {
                $input = strtok($keyword,"+");
                $count = 0;
                $arr = array();
                while ($input !== false && $count < 3)
                {
                    $arr[$count] = $input;
                    $input = strtok("+");
                    $count = $count + 1;
                }
                $value = substr($keyword,6);
                $msgType = "text";
                //$contentStr = $arr[1] . $arr[2];
                $contentStr = $this->get_kuaidi($arr[1],$arr[2]);
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            else if($keyword == "图文")
            {
                $title1="点击进入百度主页";
                $des1="这是描述1，点击进入百度主页";
                $picurl1="http://www.baidu.com/img/baidu_sylogo1.gif";
                $url1="http://www.baidu.com";
                $title2="点击进入letsgo网站";
                $des2="这是描述2，点击进入letsgo网站";
                $picurl2="http://www.letsgo.name/images/letsgo_logo.png";
                $url2="http://www.letsgo.name";
                $resultStr = sprintf($News2, $fromUsername, $toUsername, $time, $title1, $des1,$picurl1,$url1,$title2,$des2,$picurl2,$url2);
                echo $resultStr;
            }
            else if($keyword == "微信")
            {
                $msgType = "text";
                $contentStr = $fromUsername;
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            else
            {
                $msgType = "text";
                $contentStr = "你好，欢迎测试！\r\n发送\"？\"可以获取当前时间\r\n发送\"图文\"可以获取图文返回\r\n发送\"api\"可以读取测试数据库所有值\r\n发送\"joke\"可以随机获取笑话一则\r\n发送\"letsgo工号\"可以查询letsgo队员信息，比如letsgo101\r\n发送\"快递+快递公司名+单号\"可以查询快递，比如：快递+中通快递+718531551676\r\n发送\"ip\"+ip号码，可以查询ip所在地，多个ip可用,号分割，比如ip202.108.5.20,218.80.200.141";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }

        }else{
            echo "";
            exit;
        }
    }
}
function tarceHttp()
{
	logger("REMOTE_ADDR:".$_SERVER["REMOTE_ADDR"].((strpos("0".$_SERVER["REMOTE_ADDR"],"101.226"))?" FROM WEIXIN":"UnKnown IP"));
	logger("QUERY_STRING".$_SERVER["QUERY_STRING"]);
}
function logger($content)
{
	file_put_contents("log.html",date('Y-m-d H:i:s ').$content."<br/>",FILE_APPEND);
}
?>