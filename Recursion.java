// Dom Genuario
// 12/05/15
// Recursion 
// This lab helps practice recursion
public class Recursion {

	// This method will return a pattern symmetric about n
	// It takes in a parameter of type int
	// If n is less than 1, it will return an error message
	// If n is equal to 1, it will return "1 "
	public static String pattern(int n) {

		if (n < 1)
			return "Argument must be greater than or equal to 1";
		else if (n == 1)
			return "1 ";
		else {
			// The pattern will start a new line after printing an integer
			// larger than
			// 5, which makes a pattern of bigger numbers along the right
			// reading down
			if (n > 5)
				return pattern(n - 1) + n + "\n" + pattern(n - 1);

			return pattern(n - 1) + n + " " + pattern(n - 1);
		}
	}

	// This takes in an integer n as the parameter, this represents the number
	// of stars you want the hourglass to have
	// If n is less than 1, an error message will be returned
	// If n is greater than 1, it will call the helper method
	public static String hourglass(int n) {

		if (n < 1)
			return "Argument must be greater than or equal to 1";

		// Since n is greater than 1, it calls the helper method with parameters
		// n and the initial amount of spaces, which is zero
		return hourglassHelper(n, 0);

	}

	// The hourglass helper method: has parameters of int stars and int spaces
	// If stars is greater than 0, it will call the printMany method
	// If stars is less than 0, it will return a string with nothing in it
	private static String hourglassHelper(int stars, int spaces) {
		if (stars > 0)

			// When it calls printMany, it will take care of the spaces first
			// and then the stars
			// It will then call the printMany method with starts-1 and spaces+1
			// And then it will call the printMany method with what stars and
			// spaces were initially
			return printMany(spaces, " ") + printMany(stars, "*")
					+ hourglassHelper(--stars, ++spaces)
					+ printMany(--spaces, " ") + printMany(++stars, "*");
		else
			return "";
	}

	// This takes in parameters of types int and String
	// It will return a line of String s
	private static String printMany(int n, String s) {

		// If s is a star and not a space, it will work on printing stars
		// It will call printMany, each time subtracting n by 1, and print out a
		// star
		if (s == "*") {
			if (n > 1)
				return s + " " + printMany(--n, s);

			// If n is equal to one, it will print s and then a new line
			else if (n == 1)
				return s + " \n";

			// If n is less than one, it will print a String with noting inside
			else
				return "";

			// If s is a space and n is greater than 0, it will print out all of
			// the spaces by calling printMany again, each time subtracting n by
			// 1
			// If n is equal to 0, it will return a string with nothing inside
		} else if (n > 0)
			return s + printMany(--n, s);
		return "";
	}

	// This takes in a parameter of type long
	// It will return a String of the number filled with commas where they
	// should be
	public static String commas(long n) {
		String ans = Long.toString(n);

		// After converting long n to a String, it will check to see if it has
		// more than 4 characters and if so it will return the String right away
		if (ans.length() < 4)
			return ans;

		// This checks to see if n is positive
		// It will create longs of n which include the last 3 digits and the
		// front part of n not including those 3 digits
		else if (n > 0) {
			long first = n / 1000;
			long sec = n % 1000;
			String second = Long.toString(sec);

			// If the size of the last 3 digits end up being less than 3, it
			// will put 0's in the front until it does have 3 digits
			while (second.length() < 3)
				second = "0" + second;

			// It will return the front part of the String plus a comma and then
			// the remainder of the String
			return commas(first) + "," + second;
		}

		// If n is negative, it will take the absolute value of n and then call
		// the method again so that it is positive
		// When it returns the string, it adds a negative sign in the front of
		// the String
		else {
			n = Math.abs(n);
			return "-" + commas(n);
		}
	}
}
