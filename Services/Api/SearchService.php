<?php

namespace Epic\R2RioBundle\Services\Api;

use Epic\R2RioBundle\Services\Model\R2SearchAgency;
use Epic\R2RioBundle\Services\Model\R2SearchAircraft;
use Epic\R2RioBundle\Services\Model\R2SearchAirline;
use Epic\R2RioBundle\Services\Model\R2SearchAirport;
use Epic\R2RioBundle\Services\Model\R2SearchPlace;
use Epic\R2RioBundle\Services\Model\R2SearchRoute;
use Epic\R2RioBundle\Services\Model\R2SearchSegment;
use Epic\R2RioBundle\Services\Model\R2SearchStop;
use Lsw\ApiCallerBundle\Caller\ApiCallerInterface;

use Epic\R2RioBundle\Entity\R2SearchResponse;
use Epic\R2RioBundle\Services\Model\R2SearchRequest;

class SearchService extends BaseService{

    protected $flag = 0;
    protected $cache = false;
    // external services
    private $searchRequestService;
    private $searchResponseService;
    private $searchPlaceService;
    private $searchAirportService;
    private $searchAirlineService;
    private $searchAircraftService;
    private $searchAgencyService;
    private $searchRouteService;
    private $searchStopService;
    private $searchSegmentService;

    public function __construct(
        ApiCallerInterface $apiCaller, $apiKey, $apiServer,
        R2SearchRequest $searchRequest,\Epic\R2RioBundle\Services\Model\R2SearchResponse $searchResponseService,
        R2SearchPlace $searchPlace, R2SearchAirport $searchAirport, R2SearchAirline $searchAirline, R2SearchAircraft $searchAircraft,
        R2SearchAgency $searchAgency, R2SearchRoute $searchRoute, R2SearchStop $searchStop, R2SearchSegment $searchSegment
    )
    {
        parent::__construct($apiCaller, $apiKey, $apiServer);
        $this->searchRequestService = $searchRequest;
        $this->searchResponseService = $searchResponseService;
        $this->searchPlaceService = $searchPlace;
        $this->searchAirportService = $searchAirport;
        $this->searchAirlineService = $searchAirline;
        $this->searchAircraftService = $searchAircraft;
        $this->searchAgencyService = $searchAgency;
        $this->searchRouteService = $searchRoute;
        $this->searchStopService = $searchStop;
        $this->searchSegmentService = $searchSegment;
    }
    public function setFlag($flag = 0)
    {
        $this->flag = $flag;
    }

    public function setCache($cache = false)
    {
        $this->cache = $cache;
    }

    /**
     * @param array $parameters
     * @return R2SearchResponse|string
     * @throws \Exception
     */
    public function execute($parameters = array())
    {
        $requestCode = sha1(strtolower(implode('', $parameters)));
        if($this->cache) {
            $request = $this->searchRequestService->getRequestByCode($requestCode);
            if(null !== $request) {
                return $request->getSearchResponse();
            }
        }

        if(!isset($parameters['oName']) && !isset($parameters['oPos'])) {
            throw new \Exception('You most defined the parameter oName or oPos to make possible the search.');
        }

        if(!isset($parameters['dName']) && !isset($parameters['dPos'])) {
            throw new \Exception('You most defined the parameter dName or dPos to make possible the search.');
        }

        if(!isset($parameters['flags'])) {
            $parameters['flags'] = $this->flag;
        }
        if(!isset($parameters['data'])) {
            $parameters['data'] = sha1(time());
        }

        try{
            $output = $this->callApi($parameters);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }

        if($parameters['data'] != $output['data']) {
            throw new \Exception(sprintf('The request code %s not match with the response code %s', $parameters['data'],$output['data']));
        }

        if($this->cache) {
            $request = $this->searchRequestService->getEntity();
            $request->setCode($requestCode);
            if(isset($parameters['oName'])) {
                $request->setOName($parameters['oName']);
            }else {
                $request->setOName($parameters['oPos']);
            }

            if(isset($parameters['dName'])) {
                $request->setDName($parameters['dName']);
            }else {
                $request->setDName($parameters['dPos']);
            }

            $this->searchRequestService->update($request);

            $response = $this->searchResponseService->getEntity();
            $response->setSearchRequest($request);
            $this->searchResponseService->update($response);
            foreach($output as $key=>$responseData)
            {
                switch($key) {
                    case 'places':
                        $this->cachePlaces($response, $responseData);
                        break;
                    case 'airports':
                        $this->cacheAirports($response, $responseData);
                        break;
                    case 'airlines':
                        $this->cacheAirlines($response, $responseData);
                        break;
                    case 'aircrafts':
                        $this->cacheAircrafts($response, $responseData);
                        break;
                    case 'agencies':
                        $this->cacheAgencies($response, $responseData);
                        break;
                    case 'routes':
                        $this->cacheRoutes($response, $responseData);
                        break;
                    default:
                        unset($output[$key]);
                }
            }

            return $response;
        }
        return $output;
    }

    private function cachePlaces($searchResponse, $places)
    {
        foreach($places as $placeData)
        {
            $place = $this->searchPlaceService->getEntity();
            $place->setKind($placeData['kind']);
            $place->setName($placeData['name']);
            $place->setLongName($placeData['longName']);
            $place->setPos($placeData['pos']);
            $place->setSearchResponse($searchResponse);
            if(isset($placeData['countryCode']))
                $place->setCountryCode($placeData['countryCode']);
            if(isset($placeData['regionCode']))
                $place->setRegionCode($placeData['regionCode']);
            if(isset($placeData['timeZone']))
                $place->setTimeZone($placeData['timeZone']);
            $this->searchPlaceService->update($place);
        }
    }

    private function cacheAirports($searchResponse, $airports)
    {
        foreach($airports as $airportData)
        {
            $airport = $this->searchAirportService->getEntity();
            $airport->setCode($airportData['code']);
            $airport->setName($airportData['name']);
            $airport->setPos($airportData['pos']);
            $airport->setSearchResponse($searchResponse);
            if(isset($airportData['countryCode']))
                $airport->setCountryCode($airportData['countryCode']);
            if(isset($airportData['regionCode']))
                $airport->setRegionCode($airportData['regionCode']);
            if(isset($airportData['timeZone']))
                $airport->setTimeZone($airportData['timeZone']);
            $this->searchAirportService->update($airport);
        }
    }

    private function cacheAirlines($searchResponse, $airlines)
    {
        foreach($airlines as $airlineData)
        {
            $airline = $this->searchAirlineService->getEntity();
            $airline->setSearchResponse($searchResponse);
            $airline->setCode($airlineData['code']);
            $airline->setName($airlineData['name']);
            if(isset($airlineData['url']))
                $airline->setUrl($airlineData['url']);
            if(isset($airlineData['iconPath']))
                $airline->setIconPath($airlineData['iconPath']);
            if(isset($airlineData['iconSize']))
                $airline->setIconSize($airlineData['iconSize']);
            if(isset($airlineData['iconOffset']))
                $airline->setIconOffset($airlineData['iconOffset']);
            $this->searchAirlineService->update($airline);
        }
    }

    private function cacheAircrafts($searchResponse, $aircrafts)
    {
        foreach($aircrafts as $aircraftData)
        {
            $aircraft = $this->searchAircraftService->getEntity();
            $aircraft->setSearchResponse($searchResponse);
            $aircraft->setCode($aircraftData['code']);
            $aircraft->setManufacturer($aircraftData['manufacturer']);
            $aircraft->setModel($aircraftData['model']);
            $this->searchAircraftService->update($aircraft);
        }
    }

    private function cacheAgencies($searchResponse, $agencies)
    {
        foreach($agencies as $agencyData)
        {
            $agency = $this->searchAgencyService->getEntity();
            $agency->setSearchResponse($searchResponse);
            $agency->setCode($agencyData['code']);
            $agency->setName($agencyData['name']);
            if(isset($agencyData['url']))
                $agency->setUrl($agencyData['url']);
            if(isset($agencyData['iconPath']))
                $agency->setIconPath($agencyData['iconPath']);
            if(isset($agencyData['iconSize']))
                $agency->setIconSize($agencyData['iconSize']);
            if(isset($agencyData['iconOffset']))
                $agency->setIconOffset($agencyData['iconOffset']);
            $this->searchAgencyService->update($agency);
        }
    }

    private function cacheRoutes($searchResponse, $routes)
    {
        foreach($routes as $routeData)
        {
            $route = $this->searchRouteService->getEntity();
            $route->setSearchResponse($searchResponse);
            $route->setName($routeData['name']);
            $route->setDistance($routeData['distance']);
            $route->setDuration($routeData['duration']);
            $this->searchRouteService->update($route);
            // cache stop
            foreach($routeData['stops'] as $stopData)
            {
                $stop = $this->searchStopService->getEntity();
                $stop->setKind($stopData['kind']);
                $stop->setName($stopData['name']);
                $stop->setPos($stopData['pos']);
                if(isset($stopData['code']))
                    $stop->setCode($stopData['code']);
                if(isset($stopData['countryCode']))
                    $stop->setCountryCode($stopData['countryCode']);
                if(isset($stopData['regionCode']))
                    $stop->setRegionCode($stopData['regionCode']);
                if(isset($stopData['timeZone']))
                    $stop->setTimeZone($stopData['timeZone']);
                $stop->setSearchRoute($route);
                $this->searchStopService->update($stop);
            }
            //cache segments
            foreach($routeData['segments'] as $segmentData)
            {
                $segment = $this->searchSegmentService->getEntity();
                $segment->setSearchRoute($route);
                $segment->setKind($segmentData['kind']);
                $segment->setIsMajor($segmentData['isMajor']);
                $segment->setDistance($segmentData['distance']);
                $segment->setDuration($segmentData['duration']);
                if(isset($segmentData['subkind']))
                    $segment->setSubKind($segmentData['subkind']);
                if(isset($segmentData['isImperial']))
                    $segment->setIsImperial($segmentData['isImperial']);
                if(isset($segmentData['sName']))
                    $segment->setSName($segmentData['sName']);
                if(isset($segmentData['sPos']))
                    $segment->setSPos($segmentData['sPos']);
                if(isset($segmentData['tName']))
                    $segment->setTName($segmentData['tName']);
                if(isset($segmentData['tPos']))
                    $segment->setTPos($segmentData['tPos']);
                if(isset($segmentData['sCode']))
                    $segment->setSCode($segmentData['sCode']);
                if(isset($segmentData['tCode']))
                    $segment->setTCode($segmentData['tCode']);
                if(isset($segmentData['indicativePrice'])) {
                    $out = array_values($segmentData['indicativePrice']);
                    $segment->setIndicativePrice(json_encode($out));
                }
                $this->searchSegmentService->update($segment);
            }
        }
    }
}