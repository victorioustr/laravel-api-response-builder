<?php

namespace MarcinOrlowski\ResponseBuilder\Tests;

/**
 * Laravel API Response Builder
 *
 * @package   MarcinOrlowski\ResponseBuilder
 *
 * @author    Marcin Orlowski <mail (#) marcinorlowski (.) com>
 * @copyright 2016-2019 Marcin Orlowski
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/MarcinOrlowski/laravel-api-response-builder
 */

use MarcinOrlowski\ResponseBuilder\BaseApiCodes;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

class ApiCodeBaseTest extends TestCase
{
	/**
	 * Tests getMinCode() with invalid config
	 *
	 * @return void
	 */
	public function testGetMinCode_MissingConfigKey(): void
	{
		$this->expectException(\RuntimeException::class);

		\Config::offsetUnset(ResponseBuilder::CONF_KEY_MIN_CODE);
		BaseApiCodes::getMinCode();
	}

	/**
	 * Tests getMaxCode() with invalid config
	 *
	 * @return void
	 */
	public function testGetMaxCode_MissingConfigKey(): void
	{
		$this->expectException(\RuntimeException::class);

		\Config::offsetUnset(ResponseBuilder::CONF_KEY_MAX_CODE);
		BaseApiCodes::getMaxCode();
	}

	/**
	 * Tests getMap() with missing config
	 *
	 * @return void
	 */
	public function testGetMap_MissingConfigKey(): void
	{
		$this->expectException(\RuntimeException::class);

		\Config::offsetUnset(ResponseBuilder::CONF_KEY_MAP);
		BaseApiCodes::getMap();
	}

	/**
	 * Tests getMap() with wrong config
	 *
	 * @return void
	 */
	public function testGetMap_WrongConfig(): void
	{
		$this->expectException(\RuntimeException::class);

		\Config::set(ResponseBuilder::CONF_KEY_MAP, false);
		BaseApiCodes::getMap();
	}


	/**
	 * Tests getCodeMessageKey() for code outside of allowed range
	 *
	 * @return void
	 */
	public function testGetCodeMessageKey_OutOfRange(): void
	{
		$this->expectException(\InvalidArgumentException::class);

		BaseApiCodes::getCodeMessageKey(BaseApiCodes::RESERVED_MAX_API_CODE + 1);
	}
}
