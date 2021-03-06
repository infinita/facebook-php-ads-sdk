<?php
/**
 * Copyright 2014 Facebook, Inc.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Facebook.
 *
 * As with any software that integrates with the Facebook platform, your use
 * of this software is subject to the Facebook Developer Principles and
 * Policies [http://developers.facebook.com/policy/]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */

namespace FacebookAds\Object;

use FacebookAds\Object\Fields\ProductFeedFields;
use FacebookAds\Object\Traits\FieldValidation;
use FacebookAds\Cursor;

class ProductFeed extends AbstractCrudObject {
  use FieldValidation;

  /**
   * @var string[]
   */
  protected static $fields = array(
    ProductFeedFields::ID,
    ProductFeedFields::FILE_NAME,
    ProductFeedFields::FORMAT,
    ProductFeedFields::COUNTRY,
    ProductFeedFields::ENCODING,
    ProductFeedFields::DELIMITER,
    ProductFeedFields::NAME,
    ProductFeedFields::QUOTES,
    ProductFeedFields::SCHEDULE,
  );

  /**
   * @return string
   */
  protected function getEndpoint() {
    return 'product_feeds';
  }

  /**
   * @param array $fields
   * @param array $params
   * @return Cursor
   */
  public function getUploads(array $fields = array(), array $params = array()) {
    return $this->getManyByConnection(
      ProductFeedUpload::className(), $fields, $params);
  }

  /**
   * @param array $fields
   * @param array $params
   * @return Cursor
   */
  public function getProducts(
    array $fields = array(),
    array $params = array()) {
    return $this->getManyByConnection(
      Product::className(), $fields, $params);
  }
}
