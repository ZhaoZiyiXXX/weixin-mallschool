<?php

define("TOKEN", "weixin");

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress 数据库的名称 */
define('DB_NAME', '');

/** MySQL 数据库用户名 */
define('DB_USER', '');

/** MySQL 数据库密码 */
define('DB_PASSWORD', '');

/** MySQL 主机 */
define('DB_HOST', '');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

$wechatObj = new wechatCallbackapiTest();
tarceHttp();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}

class wechatCallbackapiTest
{
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
            
            //文本消息关键标签开始
            $textTpl = "<xml>
                       <ToUserName><![CDATA[%s]]></ToUserName>
                       <FromUserName><![CDATA[%s]]></FromUserName>
                       <CreateTime>%s</CreateTime>
                       <MsgType><![CDATA[%s]]></MsgType>
                       <Content><![CDATA[%s]]></Content>
                       <FuncFlag>2</FuncFlag>
                       </xml>";
            //文本消息关键标签结束
            
            //图文消息关键标签开始
            $startstring = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[news]]></MsgType>
                            <ArticleCount>%s</ArticleCount>
                            <Articles>";
            $picturestring = "<item>
                             <Title><![CDATA[%s]]></Title> 
                             <Description><![CDATA[%s]]></Description>
                             <PicUrl><![CDATA[%s]]></PicUrl>
                             <Url><![CDATA[%s]]></Url>
                             </item>";
            $endstring = "</Articles></xml> ";
            //图文消息关键标签结束
            
            //自定义菜单区域开始
            $count = "4";
            $url1 = "http://www.baidu.com" . "?wopenid=" . $fromUsername;
            $url2 = "http://www.baidu.com" . "?wopenid=" . $fromUsername;
            $url3 = "http://www.baidu.com" . "?wopenid=" . $fromUsername;
            $url4 = "http://www.baidu.com" . "?wopenid=" . $fromUsername;
            $picurl1="http://www.mallschool.com/images/logo.jpg";
            $picurl2="http://www.mallschool.com/images/huiyuan.jpg";
            $picurl3="http://www.mallschool.com/images/sell.jpg";
            $picurl4="http://www.mallschool.com/images/buy.jpg";
            $string1 = sprintf($startstring,$fromUsername, $toUsername, $time,$count);
            $string2 = sprintf($picturestring,"喵校园主页", "打开喵校园主页",$picurl1,$url1);
            $string3 = sprintf($picturestring,"【会员绑定】", "会员绑定",$picurl2,$url2);
            $string4 = sprintf($picturestring,"【我要卖书】", "我要卖书",$picurl3,$url3);
            $string5 = sprintf($picturestring,"【我要买书】", "我要买书",$picurl4,$url4);
            $defaultresponsestring = $string1.$string2.$string3.$string4.$string5.$endstring;
            //自定义菜单区域结束
            
            logger($defaultresponsestring);
            if($event =="subscribe")
            {
                echo $defaultresponsestring;
            }
            else if("ttt"==$keyword)
            {
                $msgType = "text";
                $contentStr = "较好的效果为大图640*320，小图80*80";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            else 
            {
            	echo $defaultresponsestring;
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
    //file_put_contents("log.html",date('Y-m-d H:i:s ').$content."<br/>",FILE_APPEND);
}
?>