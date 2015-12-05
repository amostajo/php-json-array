<?php
/**
 * Library test case.
 * @author Alejandro Mostajo
 */
class JSONArrayTest extends PHPUnit_Framework_TestCase
{

    /**
     * Tests and verifies that class is loading fine with composer.
     */
    public function testClassLoad()
    {
        // Prepare
        $array = new JSONArray();

        // Assert
        $this->assertEquals(count($array), 0);
    }

    /**
     * Tests JSON casting.
     */
    public function testJSONCasting()
    {
        // Prepare
        $array = new JSONArray();

        $array['id'] = 5;

        // Assert
        $this->assertEquals($array['id'], 5);

        $this->assertEquals($array->toJson(), '{"id":5}');

        $this->assertEquals((string)$array, '{"id":5}');
    }

    /**
     * Tests write to file.
     */
    public function testWrite()
    {
        // Prepare
        $array = new JSONArray();

        $array['id'] = 5;
        $array['sizes'] = [1,3,5];

        $array->write(__DIR__.'/output.json');

        // Assert
        $this->assertTrue(file_exists(__DIR__.'/output.json'));

        // Down test
        unlink(__DIR__.'/output.json');
    }

    /**
     * Tests write empty array to file.
     */
    public function testWriteEmpty()
    {
        // Prepare
        $array = new JSONArray();

        $array->write(__DIR__.'/output.json');

        // Assert
        $this->assertFalse(file_exists(__DIR__.'/output.json'));
    }

    /**
     * Tests read a file.
     */
    public function testRead()
    {
        // Prepare
        $array = new JSONArray();

        $array['id'] = 5;
        $array['sizes'] = [1,3,5];
        $array['name'] = 'a';

        $array->write(__DIR__.'/output.json');
        unset($array);

        $new = new JSONArray();

        $new->read(__DIR__.'/output.json');

        // Assert
        $this->assertEquals($new['id'], 5);

        $this->assertEquals($new['sizes'], [1,3,5]);

        $this->assertEquals($new['name'], 'a');

        // Down test
        unlink(__DIR__.'/output.json');
    }
}