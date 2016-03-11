package TestRoutines;
import RandomNameGenerator.RandomNameGenerator;

/**
 * The puppyStuffer is a means to populate the test datbase with semi-random values.
 * 
 * @author David Johnson
 *
 */
public class PuppyStuffer {
	/**
	 * The random value generator.
	 * This is NOT ours.
	 * See https://github.com/kohsuke/wordnet-random-name
	 */
	RandomNameGenerator rand = new RandomNameGenerator();
	
	/**
	 * @return Returns a random name.
	 */
	public String getRandomName() {
		return rand.next();
	}
	
	/**
	 * @return Returns a random team name.
	 */
	public String getRandomTeamName() {
		String name = getRandomName();
		return "The_" + name + "s";
	}
	
	/**
	 * @return Returns a random league name.
	 */
	public String getRandomLeagueName() {
		String name = getRandomName();
		return "League_of_" + name + "s";
	}
	
	/**
	 * @return Returns a random phone number in (xxx) xxx-xxx format.
	 */
	public String getRandomPhoneNumber() {
		int minimum = 0;
		int maximum= 9;
		int randomNum;
		StringBuilder phoneNumber = new StringBuilder();
		for(int i = 1; i <= 14; i++) {
			randomNum = minimum + (int)(Math.random() * maximum);
			switch(i) {
			case 1:
				phoneNumber.append("(");
			break;
			case 2:
			case 3:
			case 4:
				phoneNumber.append(String.valueOf(randomNum));
			break;
			case 5:
				phoneNumber.append(")");
				break;
			case 6:
				phoneNumber.append("-");
				break;
			case 7:
			case 8:
			case 9:
				phoneNumber.append(String.valueOf(randomNum));
				break;
			case 10:
				phoneNumber.append("-");
				break;
			case 11:
			case 12:
			case 13:
			case 14:
				phoneNumber.append(String.valueOf(randomNum));
				break;
				
			}
		}
		return phoneNumber.toString(); 
	}
}
