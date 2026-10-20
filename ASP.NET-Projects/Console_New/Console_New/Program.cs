namespace Console_New
{
    class Program
    {
        static void Main(String[] args)
        {
            Console.WriteLine("Hello, World!");
            Console.WriteLine(string.Join(", ", args));
            Console.WriteLine("Hi");
            //Console.WriteLine(args[1]);

            short a = 1000;
            Console.WriteLine(a);

            decimal b = 100.50m;
            Console.WriteLine(typeof(decimal));
            Console.WriteLine(b.GetType());

            int sum = 0;
            for (int i = 0; i < args.Length; i++)
            {
                if (int.TryParse(args[i], out int number))
                {
                    Console.WriteLine(int.TryParse(args[i], out int num));
                    Console.WriteLine($"Parsed number: {num}");
                    sum += number;
                }
                else
                {
                    Console.WriteLine($"'{args[i]}' is not a valid number.");
                }
            }
            Console.WriteLine($"The sum of the numbers is: {sum}");
            Console.WriteLine("Hi");
        }
    }
}