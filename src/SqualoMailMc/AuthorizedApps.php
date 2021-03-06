<?php
/**
 * sqm-mc-api-lib
 *
 * @category SqualoMail
 * @package sqm-mc-api-lib
 * @author Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date: 4/29/16 3:47 PM
 * @file: AuthorizedApps.php
 */
class SqualoMailMc_AuthorizedApps extends SqualoMailMc_Abstract
{
    /**
     * @param $clientId         The client’s unique id/username for authorization.
     * @param $clientSecret     The client password for authorization.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function add($clientId,$clientSecret)
    {
        $_params = array('cliend_id'=>$clientId,'client_secret'=>$clientSecret);
        return $this->master->call('authorized-apps',$_params,SqualoMailMc::POST);
    }

    /**
     * @param null $fields          A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param null $excludeFields   A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @param null $count           The number of records to return.
     * @param null $offset          The number of records from a collection to skip. Iterating over large collections with this parameter can be slow.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function getAll($fields=null,$excludeFields=null,$count=null,$offset=null)
    {
        $_params = array();
        if($fields) $_params['fields'] = $fields;
        if($excludeFields) $_params['exclude_fields'] = $excludeFields;
        if($count) $_params['count'] = $count;
        if($offset) $_params['offset'] = $offset;
        return $this->master->call('authorized-apps',$_params,SqualoMailMc::GET);
    }

    /**
     * @param $appId                The unique id for the connected authorized application.
     * @param null $fields          A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param null $excludeFields   A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return mixed
     * @throws SqualoMailMc_Error
     * @throws SqualoMailMc_HttpError
     */
    public function get($appId,$fields=null,$excludeFields=null)
    {
        $_params = array();
        if($fields) $_params['fields'] = $fields;
        if($excludeFields) $_params['exclude_fields'] = $excludeFields;
        return $this->master->call('authorized-apps/'.$appId,$_params,SqualoMailMc::GET);
    }
}