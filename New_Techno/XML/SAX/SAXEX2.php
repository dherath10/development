<?php
function sax_start($sax, $tag, $attr) {
  if ($tag == 'quotes') {
    echo '<ul>';
  } elseif ($tag == 'quote') {
    echo '<li>' . htmlspecialchars($attr['year']).': ';
  } elseif ($tag == 'coding') {
    echo '"';
  } elseif ($tag == 'author') {
    echo ' (';
  }
}
function sax_end($sax, $tag) {
  if ($tag == 'quotes') {
    echo '</ul>';
  } elseif ($tag == 'quote') {
    echo '</li>';
  } elseif ($tag == 'coding') {
    echo '"';
  } elseif ($tag == 'author') {
    echo ') ';
  }
}
function sax_cdata($sax, $data) {
  echo htmlspecialchars($data);
}
?>