/** 
* 得到中英文字符长 
* @param {} str 
* @return {} 
*/  
function LengthB(str){  
    var p1 = new RegExp('%u..', 'g')  
    var p2 = new RegExp('%.', 'g')  
    return escape(str).replace(p1, '').replace(p2, '').length  
}  
  
/** 
* 过滤所有空格字符 
* @param {Object} str 
*/  
function jsTrim(str){  
    str += "";  
    while ((str.charAt(0) == ' ') || (str.charAt(0) == '???') || (escape(str.charAt(0)) == '%u3000'))  
        str = str.substring(1, str.length);  
    while ((str.charAt(str.length - 1) == ' ') || (str.charAt(str.length - 1) == '???') || (escape(str.charAt(str.length - 1)) == '%u3000'))  
        str = str.substring(0, str.length - 1);  
    return str;  
}  
  
/** 
* 过滤中间字符串和多个空格 
* @param {Object} inputString 
*/  
function trim(inputString){  
    if (typeof inputString != "string") {  
        return inputString;  
    }  
    var retValue = inputString;  
    var ch = retValue.substring(0, 1);  
    while (ch == " ") {  
        //检查字符串开始部分的空格  
        retValue = retValue.substring(1, retValue.length);  
        ch = retValue.substring(0, 1);  
    }  
    ch = retValue.substring(retValue.length - 1, retValue.length);  
    while (ch == " ") {  
        //检查字符串结束部分的空格  
        retValue = retValue.substring(0, retValue.length - 1);  
        ch = retValue.substring(retValue.length - 1, retValue.length);  
    }  
    while (retValue.indexOf(" ") != -1) {  
        //将文字中间多个相连的空格变为一个空格  
        retValue = retValue.substring(0, retValue.indexOf(" ")) + retValue.substring(retValue.indexOf(" ") + 1, retValue.length);  
    }  
    return retValue;  
}  
  
/** 
* 过滤字符串,指定过滤内容，如果内容为空，则默认过滤 '~!@#$%^&*()-+." 
* @param {Object} str 
* @param {Object} filterStr 
* 
* @return 包含过滤内容，返回True,否则返回false; 
*/  
function FilterStr(str, filterStr){  
    filterStr = filterStr == "" ? "'~!@#$%^&*()-+.\"" : filterStr  
    var ch;  
    var i;  
    var temp;  
    var error = false;//当包含非法字符时，返回True  
    for (i = 0; i <= (filterStr.length - 1); i++) {  
        ch = filterStr.charAt(i);  
        temp = str.indexOf(ch);  
        if (temp != -1) {  
            error = true;  
            break;  
        }  
    }  
    return error;  
}  
  
/** 
* 过滤指定内容字符串 
* @param {Object} str　检查字符串 
* @param {Object} filterStr　过滤字符串，内容为空，则默认过滤 '~!@#$%^&*()-+." 
* @param {Object} alertStr　弹出对话内容 
* @param {Object} idStr　出错返回出错字段ID 
*/  
function ISFilterStr(str, filterStr, alertStr, idStr){  
    alertStr = "对不起,您输入的 " + alertStr + " 不允包含 " + filterStr + " 非法字符";  
    if (FilterStr(str, filterStr))  
        return false; 
}  
  
/** 
* 检查是否为网址 
* @param {} str_url 
* @param {} alertStr    弹出字段内容 
* @param {} idStr    光标定位的字段ID<b>只能接收ID</b> 
* @return {Boolean} <b>不是</b>网址返回false; 
*/  
function IsURL(str_url, alertStr, idStr){// 验证url  
  
    alertStr = alertStr + " 格式不正确!";  
    var strRegex = "^((https|http|ftp|rtsp|mms)?://)" +  
    "?(([0-9a-z_!~*'().&=+$%-]+: )?[0-9a-z_!~*'().&=+$%-]+@)?" // ftp的user@  
+  
    "(([0-9]{1,3}\.){3}[0-9]{1,3}" // IP形式的URL- 199.194.52.184  
+  
    "|" // 允许IP和DOMAIN（域名）  
+  
    "([0-9a-z_!~*'()-]+\.)*" // 域名- www.  
+  
    "([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\." // 二级域名  
+  
    "[a-z]{2,6})" // first level domain- .com or .museum  
+  
    "(:[0-9]{1,4})?" // 端口- :80  
+  
    "((/?)|" // a slash isn't required if there is no file name  
+  
    "(/[0-9a-z_!~*'().;?:@&=+$,%#-]+)+/?)$";  
    var re = new RegExp(strRegex);  
    if (!re.test(str_url))  
        return false; 
}  
  
/** 
* 检查是否为电子邮件 
* @param {} str 
* @return {Boolean} <b>不是</b>电子邮件返回false; 
*/  
function IsEmail(str){  
    var re = /^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;    
    return re.test(str);
}  
  
/** 
* 检查是否为数字 
* @param {} str 
*/  
function IsNum(str){  
    var re = /^[\d]+$/  
    return re.test(str);  
}  
  
/** 
* 检查数值是否在给定范围以内<br> 
* @param {} str_num 
* @param {} moreLen     应该大于或者等于的数值 
* @param {} lessLen    应该小于或者等于的数值 
* @param {} alertStr    弹出字段内容 
* @param {} idStr    光标定位的字段ID<b>只能接收ID</b> 
* @return {Boolean} <b>小于最小数值或者大于最大数值</b>数字返回false; 
*/  
function IsRangeNum(str_num, moreLen, lessLen, alertStr, idStr){  
    IsNum(str_num, alertStr, idStr);  
    if (moreLen != "") {  
        alertStr = alertStr + " 数值不能小于 " + moreLen;  
        if (str_num < moreLen)  
            return false; 
    }  
    if (lessLen != "") {  
        alertStr = alertStr + " 数值不能大于 " + lessLen;  
        if (str_num > lessLen)  
            return false; 
    }  
    if (moreLen == "" && lessLen == "")  
        this.AlertAndRFalse("没有定义最大最小长度!", idStr);  
}  
  
/** 
* 检查是否为合格字符串(不区分大小写)<br> 
* 长度在6至20位,并且是由a-z0-9_组成的字符串 
* @param {} str    检查的字符串 
* @param {} alertStr    弹出字段内容 
* @param {} idStr    光标定位的字段ID<b>只能接收ID</b> 
* @return {Boolean} <b>不是</b>"长度在6至20位且由a-z0-9_"组成返回false; 
*/  
function IsLicit(str, alertStr, idStr){  
    alertStr = "对不起," + alertStr + " 不能为空并且只能由 0到9 a到z 下划线 的6到20位组成! ";  
    var re = /^[_0-9a-zA-Z]{6,20}$/  
    if (!re.test(str))  
        return false; 
}  
  
  
/** 
* 检查字符串是否在给定长度范围以内(中文字符以2个字节计算)<br> 
* 
* @param {} str 检查的字符 
* @param {} moreLen     应该大于或者等于的长度 
* @param {} lessLen    应该小于或者等于的长度 
* @param {} alertStr    弹出字段内容 
* @param {} idStr    光标定位的字段ID<b>只能接收ID</b> 
* @return {Boolean} <b>小于最小长度或者大于最大长度</b>数字返回false; 
*/  
function IsRange(str, moreLen, lessLen, alertStr, idStr){  
    var strLen = LengthB(str);  
    if (moreLen != "") {  
        alertStr = alertStr + " 应该大于或等于 " + moreLen + " 个字节长度!";  
        if (strLen < moreLen)  
            return false; 
    }  
    if (lessLen != "") {  
        alertStr = alertStr + " 应该小于或等于 " + lessLen + " 个字节长度!";  
        if (strLen > lessLen)  
            return false; 
    }  
    if (moreLen == "" && lessLen == "")  
        this.AlertAndRFalse("没有定义最大最小长度!", idStr);  
}  
  
/** 
* 检查字符串是否小于给定长度范围(中文字符以2个字节计算)<br> 
* @param {} str    字符串 
* @param {} lessLen    小于或等于长度 
* @param {} alertStr    弹出字段内容 
* @param {} idStr    光标定位的字段ID<b>只能接收ID</b> 
* @return {Boolean} <b>大于给定长度</b>数字返回false; 
*/  
function IsLess(str, lessLen, alertStr, idStr){  
    IsRange(str, "", lessLen, alertStr, idStr);  
}  
  

  
  