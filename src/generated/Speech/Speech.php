<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Speech;

use Google\Client;
use Google\Service\Service;
use Google\Service\Speech\Resource;

/**
 * Service definition for Speech (v1).
 *
 * <p>
 * Converts audio to text by applying powerful neural network models.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/speech-to-text/docs/quickstart-protocol" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Speech extends Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $operations;
  public $projects_locations_operations;
  public $speech;
  
  /**
   * Constructs the internal representation of the Speech service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://speech.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'speech';

    $this->operations = new Speech\Resource\Operations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/operations/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );

    $this->projects_locations_operations = new Speech\Resource\ProjectsLocationsOperations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+name}/operations',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
              ],
            ],
          ]
        ]
    );

    $this->speech = new Speech\Resource\Speech(
        $this,
        $this->serviceName,
        'speech',
        [
          'methods' => [
            'longrunningrecognize' => [
              'path' => 'v1/speech:longrunningrecognize',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'recognize' => [
              'path' => 'v1/speech:recognize',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}
