<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'qtype_ddmarker', language 'pt_br', branch 'MOODLE_30_STABLE'
 *
 * @package   qtype_ddmarker
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['alttext'] = 'Texto alternativo';
$string['answer'] = 'Resposta';
$string['bgimage'] = 'Imagem de fundo';
$string['coords'] = 'Coordenadas';
$string['correctansweris'] = 'A resposta correta é: {$a}';
$string['draggableitemtype'] = 'Tipo';
$string['dropzone'] = 'Área de arrastar e soltar {$a}';
$string['dropzoneheader'] = 'Áreas de arrastar e soltar';
$string['dropzones'] = 'Áreas de arrastar e soltar';
$string['followingarewrong'] = 'Os seguintes marcadores foram colocados na área errada: {$a}.';
$string['followingarewrongandhighlighted'] = 'Os seguintes marcadores foram incorretamente colocados: {$a} . Marcador(es) realçado(s) (é)são agora mostrado(s) com a colocação correta(s) . <br /> Clique no marcador para destacar a área permitida.';
$string['formerror_nobgimage'] = 'Você precisa selecionar uma imagem para usar como plano de fundo para a área de arrastar e soltar.';
$string['formerror_noitemselected'] = 'Você especificou uma área para soltar, mas não escolheu um marcador que deve ser arrastado para essa área.';
$string['formerror_nosemicolons'] = 'Não há ponto e vírgula em sua seqüência de coordenadas. Suas coordenadas para a {$a->shape} deve ser expressa como - {$a->coordsstring}.';
$string['formerror_onlysometagsallowed'] = 'Apenas "{$ a} " tags são permitidas no rótulo para um marcador.';
$string['formerror_onlyusewholepositivenumbers'] = 'Por favor, use apenas números inteiros positivos para especificar coordenadas x, y e / ou largura e altura de formas. Suas coordenadas para a {$a->shape} deve ser expressa como - {$a->coordsstring}.';
$string['formerror_polygonmusthaveatleastthreepoints'] = 'Para uma forma poligonal você precisa especificar pelo menos 3 pontos. Suas coordenadas para a {$a->shape} devem ser expressas como - {$a->coordsstring}.';
$string['formerror_repeatedpoint'] = 'Você digitou as mesmas coordenadas duas vezes. Cada ponto deve ser exclusivo. Suas coordenadas para a {$a->shape} devem ser expressas como - {$a->coordsstring}.';
$string['formerror_shapeoutsideboundsofbgimage'] = 'A forma que você definiu sai dos limites da imagem de fundo.';
$string['formerror_toomanysemicolons'] = 'Há também muitas partes separadas por ponto e vírgula para as coordenadas especificadas. Suas coordenadas para a {$a->shape} devem ser expressas como - {$a->coordsstring}.';
