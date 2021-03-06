<?php
/**
 *
 * Copyright (c) 2009, Persistent Systems Limited
 *
 * Redistribution and use, with or without modification, are permitted
 *  provided that the following  conditions are met:
 *   - Redistributions of source code must retain the above copyright notice,
 *     this list of conditions and the following disclaimer.
 *   - Neither the name of Persistent Systems Limited nor the names of its contributors
 *     may be used to endorse or promote products derived from this software
 *     without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
 * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS;
 * OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
 * WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,
 * EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace SSRS;

/**
 *
 * class Utility
 */
class Utility {
    /**
     * @param $property
     * @return array
     */
    public static function getAttributes($property) {
        $AttributeCollection = array();
        $rawAttributes = $property->getDocComment();
        $attributes = explode("\n", $rawAttributes);
        foreach ($attributes as $attribute) {
            $i = strpos($attribute, "@");
            if ($i !== FALSE) {
                $j = strpos($attribute, ":");
                $key = substr($attribute, $i + 1, $j - $i - 1);
                $value = trim(substr($attribute, $j + 1));
                if (trim($value) == 'true') {
                    $value = true;
                }
                else if (trim($value) == 'false') {
                    $value = false;
                }
                $AttributeCollection[trim($key)] = $value;
            }
        }
        return $AttributeCollection;
    }
}


