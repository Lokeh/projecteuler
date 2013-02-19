<?php

/**
 * A class for conveniently creating a 2D square matrix from a 1D array of values, and computing the product of 4 adjacent numbers in the matrix
 *
 * @author Will Acton
 */
class matrix
{
    public $matrix;
    public $rows;
    public $cols;
    
    public function create() // $cols - number of columns; $rows - number of rows
    {   
        $this->matrix = array_fill(0,$this->rows,array_fill(0,$this->cols,0));
    }
    
    public function fill($values) // $values - 1D matrix we're converting NOTE: Only works for square matrices. Address later.
    {
        for ($i=0;$i<$this->rows;$i++)
        {
            for ($j=0;$j<$this->cols;$j++)
            {
                $this->matrix[$i][$j] = $values[($this->rows)*$i+$j];
                /* For 3x3 matrix:
                 * Values = [0 1 2 3 4 5 6 7 8] => [0 1 2               rows*i+j = (3*0)+j
                 *                                  3 4 5  = Matrix     rows*i+j = (3*1)+j
                 *                                  6 7 8]                       = (3*2)+j
                 *
                 */
            }
        }
    }
    
    public function get_adj_rdiag($r, $c) // $r - row # ; $c - col #
    {
        if (array_key_exists($r, $this->matrix) && array_key_exists($c, $this->matrix[0]) && ($r+3)<$this->rows && ($c+3)<$this->cols)
        {
            $val = 1;
            for ($i=0;$i<4;$i++)                              // get_adj_rdiag(0,0) :=                                                   
                $val = $val*($this->matrix[$r+$i][$c+$i]);    // [0,0]
            return $val;                                      //      [1,1]
        }                                                     //           [2,2]
        else                                                  //                [3,3]
            return -1;
    }
    
    public function get_adj_ldiag($r, $c)
    {
        if (array_key_exists($r, $this->matrix) && array_key_exists($c, $this->matrix[0]) && ($r+3)<$this->rows && ($c-3)>=0)
        {
            $val = 1;
            for ($i=0;$i<4;$i++)
                $val = $val*($this->matrix[$r+$i][$c-$i]); // get_adj_ldiag(0,3) := [0,3]*[1,2]*[2,1]*[3,0]
            return $val;
        }
        else
            return -1;
    }
    
    public function get_adj_up($r,$c)
    {
        if (array_key_exists($r, $this->matrix) && array_key_exists($c, $this->matrix[0]) && ($r-3)>=0)
        {
            $val = 1;
            for ($i=0;$i<4;$i++)
                $val = $val*($this->matrix[$r-$i][$c]);
            return $val;
        }
        else
            return -1;
    }
    
    public function get_adj_down($r,$c)
    {
        if (array_key_exists($r, $this->matrix) && array_key_exists($c, $this->matrix[0]) && ($r+3)<sizeof($this->matrix[0]))
        {
            $val = 1;
            for ($i=0;$i<4;$i++)
                $val = $val*($this->matrix[$r+$i][$c]);
            return $val;
        }
        else
            return -1;
    }
    
    public function get_adj_left($r,$c)
    {
        if (array_key_exists($r, $this->matrix) && array_key_exists($c, $this->matrix[0]) && ($c-3)>=0)
        {
            $val = 1;
            for ($i=0;$i<4;$i++)
                $val = $val*($this->matrix[$r][$c-$i]);
            return $val;
        }
        else
            return -1;
    }
    
    public function get_adj_right($r,$c)
    {
        if (array_key_exists($r, $this->matrix) && array_key_exists($c, $this->matrix[0]) && ($c+3)<sizeof($this->matrix))
        {
            $val = 1;
            for ($i=0;$i<4;$i++)
                $val = $val*($this->matrix[$r][$c+$i]);
            return $val;
        }
        else
            return -1;
    }
}

?>
