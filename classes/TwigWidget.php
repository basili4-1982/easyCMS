<?php

/**
 * Created by PhpStorm.
 * User: v.ahmedjanov
 * Date: 14.04.2016
 * Time: 14:17
 */
class TwigWidget extends Twig_TokenParser
{
    public function parse(Twig_Token $token)
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();
        $names = $this->parser->getExpressionParser()->parseAssignmentExpression();
        
        $capture = false;
        if ($stream->nextIf(Twig_Token::OPERATOR_TYPE, '=')) {
            $values = $this->parser->getExpressionParser()->parseMultitargetExpression();

            $stream->expect(Twig_Token::BLOCK_END_TYPE);

            if (count($names) !== count($values)) {
                throw new Twig_Error_Syntax('When using set, you must have the same number of variables and assignments.', $stream->getCurrent()->getLine(), $stream->getFilename());
            }
        } else {
            $capture = true;

            if (count($names) > 1) {
                throw new Twig_Error_Syntax('When using set with a block, you cannot have a multi-target.', $stream->getCurrent()->getLine(), $stream->getFilename());
            }

            $stream->expect(Twig_Token::BLOCK_END_TYPE);

            $values = $this->parser->subparse(array($this, 'decideBlockEnd'), true);
            $stream->expect(Twig_Token::BLOCK_END_TYPE);
        }



        return new TwigNode($capture, $names, $values, $lineno, $this->getTag());

    }

    public function getTag()
    {
        return 'widget';
    }
}