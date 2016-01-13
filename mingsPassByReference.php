<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    <?php 
        $a = 'aAaAaAaA';
        
        function_a($a);

        echo $a . "...<br/>\n";
        
        function_b($a);
        
        echo $a . "...<br/>\n";
        /*
        echo date("F") . "<br/>";

        echo date("F", strtotime("-1 Months")) . "<br/>"; 

        $curMonth = (integer)date('m');
        $prevMonth = (integer)date('m', strtotime("-1 Months"));
        echo "$curMonth $prevMonth<br/>";
        
        $curMonth = (integer)date('Y m');
        $prevMonth = (integer)date('Y m', strtotime("-9 Months"));
        echo "$curMonth $prevMonth<br/>";
        
        $prev_month_year = date('Y', mktime(0, 0, 0, date('m') -1, date('d'), date('Y')));
        $prev_month = date('m', mktime(0, 0, 0, date('m') -1, date('d'), date('Y')));
        $prev_month = (int)$prev_month;
        */
        exit;
        
        // Ming's explanation
        //
        // function_a delcared variable '$abc' locally, but on invocation,
        // the variable '$abc' declared here will take a copy of the caller's parameters value
        // this is call 'call by value', which mean only the value of the paramete was passed in,
        // any change inside the function function_a will not affect the content of the
        // variable declared by the caller.
        
        /* 
         * My explanation after figuring it out.
         * 
         * function_a brings takes paramater $a as $abc. $a is taken from outside the function 
         * it is using "global". 
         */ 
     
        function function_a($abc)
        {
            global $a;
            echo "value of parameter 1: $abc my variable a is: $a...<br/>\n";
            
            $abc = 'holy smoke';
            
        }

        /*
         * Ming's explanation
         * 
         * Here, parameter $abc was declared by function 'function_b' as pass by reference,
         * which means that upon invocation of the function, the variable $abc was not
         * declared locally inside function_b, instead, it uses the same variable $a as 
         * declared in the calling statement to invoke this function.
         * 
         * So call b reference means that one can change the content of the passing in parameer
         * inside the function.
         */
        
        /* 
         * My explanation after figuring it out.
         * 
         * function_b brings takes argument $a as parameter $abc. $abc from inside the function (as 
         * "holy smoke" pushes back out the function via the function parameter and in the calling 
         * function's argument (which is $a), is now "holy smoke". So it comes in the function as 
         * one variable, and pushes back out with a new value to that variable; it's two-way 
         * versus function_a's one-way.
         */ 
        function function_b(&$abc)
        {
            echo "value of parameter 1 of function b: $abc...<br/>\n";
            
            $abc = 'holy smoke';
        }
    ?>
    </body>
</html>
