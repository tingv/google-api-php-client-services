<?php

$servicesClassMap = [
    'Google_Collection' => 'Collection',
    'Google_Exception' => 'Exception',
    'Google_Model' => 'Model',
    'Google_Service' => 'Service',
    'Google_Service_Resource' => 'Resource',
];

spl_autoload_register(function ($class) use ($servicesClassMap) {
    $classExists = false;
    if (isset($servicesClassMap[$class])) {
        // Creates an alias for classes in the classmap above
        //     Google_Collection
        //      => Google\Service\Collection
        $newClass = 'Google\\Service\\' . $servicesClassMap[$class];
        $classExists = true;
    } elseif (0 === strpos($class, 'Google_Service_')) {
        if (2 === substr_count($class, '_')) {
            // Creates an alias for API classes
            //     Google_Service_Speech
            //      => Google\Service\Speech\Speech
            $classParts = explode('_', $class);
            $newClass = sprintf(
                'Google\\Service\\%s\\%s',
                $classParts[2],
                $classParts[2]
            );
            $classExists = class_exists($newClass);
        } elseif (class_exists($newClass = str_replace('_', '\\', $class))) {
            // Creates an alias for resource classes
            //     Google_Service_Speech_Resource_Operations
            //      => Google\Service\Speech\Resource\Operations
            $classExists = true;
        } else {
            // Creates an alias for model classes
            //     Google_Service_Speech_ListOperationsResponse
            //      => Google\Service\Speech\Model\ListOperationsResponse
            $newClass = substr_replace(
                $newClass,
                '\\Model',
                strrpos($newClass, '\\'),
                0
            );

            $classExists = class_exists($newClass);
        }
    }

    if ($classExists) {
        class_alias($newClass, $class);
        return true;
    }
}, true, true);
