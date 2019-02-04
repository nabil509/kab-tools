<?php
/**
 * This file is part of Kabyle Tools projet. See COPYING.md for license details.
 *
 * @author    Nabil SEMAOUNE <nabil509@gmail.com>
 * @copyright Nabil SEMAOUNE
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

$word = $_POST['word'];
$plural = $_POST['plural'];

if (!preg_match('/[a-zɛčḍǧḥṛɣṣṭẓƐČḌǦḤṚƔṢṬẒ]/ui', $word)) {
    return json_encode([
        'success' => false,
        'error' => 'Awal i d-teskecmeḍ mačči d ameɣtu.'
    ]);
} elseif (!preg_match('/[a-zɛčḍǧḥṛɣṣṭẓƐČḌǦḤṚƔṢṬẒ]/ui', $word)) {
    return json_encode([
        'success' => false,
        'error' => 'Awal i d-teskecmeḍ mačči d ameɣtu.'
    ]); {

    $word = kt_to_lower($word);

    return json_encode([
        'success' => true,
        'word' => $word,
        'annexion' => annexion_state($word, $plural)
    ]);
}

function kt_to_lower($text)
{
    global $specialCharsUpper, $specialCharsLower;

    // Secure UTF-8 chars.
    $result = str_replace([ 'ɛ', 'Ɛ', 'ɣ', 'Ɣ' ], [ '\1', '\1', '\2', '\2' ], $text);
    $result = strtolower($result);
    $result = str_replace([ '\1', '\2' ], [ 'ɛ', 'ɣ' ], $result);

    return str_replace($specialCharsUpper, $specialCharsLower, $result);
}

function kt_annexion_state()
{
    if (preg_match('#^u[^aiuoe]{1,}.*$#i', $word)) {
        return 'w' . $word;
    }

}
