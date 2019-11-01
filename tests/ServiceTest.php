<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

namespace Google\Service;

use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    /**
     * @dataProvider serviceProvider
     */
    public function testIncludes($class)
    {
        $this->assertTrue(
            class_exists($class),
            sprintf('Failed asserting class %s exists.', $class)
        );
    }

    public function testCaseConflicts()
    {
        $apis = $this->apiProvider();
        $classes = array_unique(array_map('strtolower', $apis));
        $this->assertCount(count($apis), $classes);
    }

    public function serviceProvider()
    {
        $classes = array();
        $path = __DIR__ . '/../src/generated/';
        foreach (glob($path . "*") as $dir) {
            $service = basename($dir);
            $classes[] = array("Google\Service\\$service\\$service");
            foreach (glob($path . "$service/Model/*.php") as $file) {
                $classes[] = array("Google\Service\\$service\Model\\" . basename($file, '.php'));
            }
            foreach (glob($path . "$service/Resource/*.php") as $file) {
                $classes[] = array("Google\Service\\$service\Resource\\" . basename($file, '.php'));
            }
        }

        return $classes;
    }

    public function apiProvider()
    {
        $path = __DIR__ . '/../src/generated/*';
        return array_filter(glob($path), 'is_dir');
    }
}
