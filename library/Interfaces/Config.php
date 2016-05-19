<?php
namespace Swiftx\Ioc\Interfaces;
use Swiftx\Ioc\Exception;

/**
 * IOC配置类
 *
 * @author		Hismer <odaytudio@gmail.com>
 * @since		2015-11-08
 * @copyright	Copyright (c) 2014-2015 Swiftx Inc.
 *
 * @property bool   $Debug    调试模式
 * @property string $LogOut   日志输出
 * @property string $RuleFile 配置文件
 * @property string $CacheDir 缓存目录
 *
 */
abstract class Config {

    /**
     * 属性访问
     * @param string $name
     * @return mixed
     * @throws Exception
     */
    public function __get(string $name){
        $method = '_get'.$name;
        if(!method_exists($this,$method))
            throw new Exception('访问的属性不可读',300);
        return $this->$method();
    }

    /**
     * 属性设置
     * @param string $name
     * @param mixed $value
     * @return mixed
     * @throws Exception
     */
    public function __set(string $name,$value){
        $method = '_set'.$name;
        if(!method_exists($this,$method))
            throw new Exception('访问的属性不可写',300);
        $this->$method($value);
        return $value;
    }


}