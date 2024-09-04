<?php

namespace Anfi\Rememberable;

use Anfi\Rememberable\Query\Builder;

/**
 * @method static array getCached(array $columns = ['*'])
 * @method static array pluckCached(string $column, mixed $key = null)
 * @method static \Illuminate\Database\Query\Builder|\Anfi\Rememberable\Query\Builder remember(\DateTime|int $seconds, string $key = null)
 * @method static \Illuminate\Database\Query\Builder|\Anfi\Rememberable\Query\Builder rememberForever(string $key = null)
 * @method static \Illuminate\Database\Query\Builder|\Anfi\Rememberable\Query\Builder dontRemember()
 * @method static \Illuminate\Database\Query\Builder|\Anfi\Rememberable\Query\Builder doNotRemember()
 * @method static \Illuminate\Database\Query\Builder|\Anfi\Rememberable\Query\Builder prefix(string $prefix)
 * @method static \Illuminate\Database\Query\Builder|\Anfi\Rememberable\Query\Builder cacheTags(array|mixed $cacheTags)
 * @method static \Illuminate\Database\Query\Builder|\Anfi\Rememberable\Query\Builder cacheDriver(string $cacheDriver)
 * @method static \Illuminate\Cache\CacheManager getCache()
 * @method static \Illuminate\Cache\CacheManager getCacheDriver()
 * @method static string getCacheKey(mixed $appends = null)
 * @method static string generateCacheKey(mixed $appends = null)
 * @method static boolean flushCache(mixed $cacheTags = null)
 * @method static \Closure getCacheCallback(array $columns)
 * @method static \Closure pluckCacheCallback(string $column, mixed $key = null)
 */
trait Rememberable
{
    /**
     * Get a new query builder instance for the connection.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function newBaseQueryBuilder()
    {
        $conn = $this->getConnection();

        $grammar = $conn->getQueryGrammar();

        $builder = new Builder($conn, $grammar, $conn->getPostProcessor());

        // UNUSED PROPERTIES FOR OUR OWN USAGE OF THE PACKAGE
        
        // if (isset($this->rememberFor)) {
        //     $builder->remember($this->rememberFor);
        // }

        // if (isset($this->rememberCacheTag)) {
        //     $builder->cacheTags($this->rememberCacheTag);
        // }

        // if (isset($this->rememberCachePrefix)) {
        //     $builder->prefix($this->rememberCachePrefix);
        // }

        // if (isset($this->rememberCacheDriver)) {
        //     $builder->cacheDriver($this->rememberCacheDriver);
        // }

        return $builder;
    }
}
