/* Domnick Genuario
 * 9/1/15
 * Life Matrix
 * This lab will create a two-dimensional array of booleans. 
 * The borders of the matrix will be false and the values inside the matrix are equally likely to be true or false.
 */
import java.util.*;
import java.io.*;

public class Life {

	public static void main(String[] args) throws FileNotFoundException {
		Scanner console = new Scanner(System.in);
		int numberOfRows = console.nextInt();
		int numberOfColumns = console.nextInt();
		long seedNumber = console.nextLong();
		int birthLow = console.nextInt();
		int birthHigh = console.nextInt();
		int liveLow = console.nextInt();
		int liveHigh = console.nextInt();
		boolean[][] matrix = makeMatrix(numberOfRows, numberOfColumns,
				seedNumber);
		printMatrix(matrix);
		System.out.println();
		boolean[][] cloneMatrix = cloneMatrix(matrix);
		boolean[][] newMatrix = (aliveOrDead(cloneMatrix, matrix, birthLow,
				birthHigh, liveLow, liveHigh));
		printMatrix(newMatrix);
		System.out.println();
		// After each matrix is printed, the matrix that was modified will be
		// put into the method cloneMatrix() so that the newest matrix can be
		// counted and changed.
		for (int i = 1; i < 5; i++) {
			printMatrix(aliveOrDead(cloneMatrix(newMatrix), matrix, birthLow,
					birthHigh, liveLow, liveHigh));
			System.out.println();
		}
	}

	// Precondition: It will take in the matrix that was made from the method
	// makeMatrix().
	// This method prints out the matrix. It will print out "- " wherever the
	// matrix is false, and will print out "# " wherever the matrix is true.
	// Postcondition: The matrix will be printed out, "- " for false and "# "
	// for true.
	public static void printMatrix(boolean[][] matrix) {
		for (int i = 0; i < matrix.length; i++) {
			for (int j = 0; j < matrix[i].length; j++) {
				if (matrix[i][j] == true) {
					System.out.print("# ");
				} else {
					System.out.print("- ");
				}
			}
			System.out.println();
		}
	}

	// Precondition: It takes in the integers (x and y) which are the values to
	// set the array, and takes in the random seed.
	// This method makes the matrix. It sets the whole matrix false and then
	// sets the whole matrix, other than the borders, equally to be true or
	// false, then it returns the matrix.
	// PostCondition: The matrix borders are filled with false and the inside is
	// equally to be true or false depending on what the seed value is.
	public static boolean[][] makeMatrix(int x, int y, long seedValue) {
		boolean[][] matrix = new boolean[x][y];
		Random seed = new Random(seedValue);
		for (int i = 0; i < x; i++) {
			for (int j = 0; j < y; j++) {
				matrix[i][j] = false;
			}
		}
		for (int i = 1; i < x - 1; i++) {
			for (int j = 1; j < y - 1; j++) {
				matrix[i][j] = seed.nextBoolean();
			}
		}
		return matrix;
	}

	// Precondition: This will take in the matrix that was already made.
	// This method returns a clone of the matrix that was put into this method.
	// Postcondition: Provides a new matrix exactly the same as the matrix that
	// was taken into the method.
	public static boolean[][] cloneMatrix(boolean[][] myMatrix) {
		boolean[][] myNewMatrix = (boolean[][]) myMatrix.clone();
		for (int row = 0; row < myMatrix.length; row++) {
			myNewMatrix[row] = (boolean[]) myMatrix[row].clone();
		}
		return myNewMatrix;
	}

	// Precondition: This takes in the clone matrix, the original matrix, and
	// the birth ranges and the live ranges.
	// This method will go through the matrix starting inside of the borders.
	// For every spot in the matrix, it will go through the 8 neighbors
	// surrounding that spot. If it is alive, the method will count all of the
	// alive neighbors and then send that number to the method possibleDeath()
	// to see if
	// it will live or die. Same thing with if it is dead, it will count all of
	// the alive neighbors and then send that number to the method
	// possibleBirth()
	// to see if it will be born or remain dead. It reads from the cloneMatrix
	// and then it will make changes to the original matrix.
	// Postcondition: It returns the original matrix (the one with the changes
	// not the clone).

	public static boolean[][] aliveOrDead(boolean[][] cloneMatrix,
			boolean[][] matrix, int birthLow, int birthHigh, int liveLow,
			int liveHigh) {
		for (int i = 1; i < cloneMatrix.length - 1; i++) {
			for (int j = 1; j < cloneMatrix[i].length - 1; j++) {
				int alive = 0;
				for (int k = i - 1; k < i + 2; k++) {
					for (int l = j - 1; l < j + 2; l++) {
						if (cloneMatrix[k][l] == true)
							alive++;
					}
				}

				// Once alive is counted, depending on whether cloneMatrix[i][j]
				// is true or false, it will send it to either possibleDeath()
				// or possibleBirth(). If cloneMatrix[i][j] is alive and is
				// outside the live range than it will become false (dead). If
				// cloneMatrix[i][j] is dead and is inside the birth range than
				// it will become true (alive).
				if (cloneMatrix[i][j] == true) {
					if (possibleDeath(liveLow, liveHigh, alive) == false)
						matrix[i][j] = false;
				} else {
					if (possibleBirth(birthLow, birthHigh, alive) == true)
						matrix[i][j] = true;
				}
			}
		}
		return matrix;
	}

	// Precondition: This will take in the live ranges and the value "alive"
	// which was counted in the method aliveOrDead().
	// Postcondition: It will return true if "alive" is within the live range
	// and will return false if it is outside the range.
	public static boolean possibleDeath(int liveLow, int liveHigh, int alive) {

		return ((alive >= liveLow) && (alive <= liveHigh));
	}

	// Precondition: This will take in the birth ranges and the value "alive"
	// which was counted in the method aliveOrDead().
	// Postcondition: It will return true if "alive" is within the birth range
	// and will return false if it is outside the range.
	public static boolean possibleBirth(int birthLow, int birthHigh, int dead) {

		return ((dead >= birthLow) && (dead <= birthHigh));

	}

}
