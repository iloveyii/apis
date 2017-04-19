<?php
/**
 * Created by PhpStorm.
 * User: talha
 * Date: 2017-04-19
 * Time: 18:33
 */

require_once('./api.php');

class MyApi extends Api
{
    private $cities = [
        1 => [
            'name'=>'Stockholm',
            'population'=>4587677,
            'country'=> 'Sweden'
        ],
        2 => [
            'name'=>'Gothunberg',
            'population'=>769979,
            'country'=> 'Sweden'
        ],
        3 => [
            'name' => 'Zurich',
            'population' => 979797,
            'country'=> 'Switzerland'
        ],
        4 => [
            'name' => 'London',
            'population' => 4243432,
            'country'=> 'UK'
        ]
    ];
    public function __construct($request, $origin)
    {
        parent::__construct($request);

        $cities = $this->cities;

        if(file_exists('city.json')) {
            $this->cities = json_decode(file_get_contents('city.json'), true);
            if(count($this->cities) < 1) {
                file_put_contents('city.json', json_encode($cities, JSON_PRETTY_PRINT));
                $this->cities = $cities;
            }
        } else {
            file_put_contents('city.json', json_encode($this->cities, JSON_PRETTY_PRINT));
        }
    }

    /**
     * Example of an Endpoint
     */
    protected function example()
    {
        if ($this->method == 'GET') {
            return "Your verb is " . $this->verb;
        } else {
            return "Only accepts GET requests";
        }
    }

    protected function city()
    {
        switch($this->method) {
            case 'GET':
                if(empty($this->verb)) {
                    return $this->cities;
                } else {
                    return isset($this->cities[$this->verb]) ? $this->cities[$this->verb] : 'City not found';
                }
                break;
            case 'PUT':
                $msg = 'Nothing to update';
                if( ! empty($this->file)) {
                    parse_str($this->file,  $params);
                    if(isset($params['id']) && isset($this->cities[$params['id']])) {
                        $id = $params['id'];
                        unset($params['id']);
                        $this->cities[$id] = $params;
                        file_put_contents('city.json', json_encode($this->cities, JSON_PRETTY_PRINT));
                        $msg = 'City updated: ' . $params['name'];
                    }
                }
                return $msg;
                break;
            case 'POST':
                if( ! empty($this->request) && isset($this->request['id'])) {
                    $id = $this->request['id'];
                    unset($this->request['id']);
                    $this->cities[$id] = $this->request;
                    file_put_contents('city.json', json_encode($this->cities, JSON_PRETTY_PRINT));
                    return 'City added: ' . $this->request['name'];
                }
                break;
            case 'DELETE':
                $msg = 'Nothing to delete';
                if(! empty($this->verb)) {
                    if(isset($this->cities[$this->verb])) {
                        unset($this->cities[$this->verb]);
                        file_put_contents('city.json', json_encode($this->cities, JSON_PRETTY_PRINT));
                        $msg = 'Deleted city : ' . $this->verb;
                    }
                }
                return $msg;
                break;
        }
    }
}