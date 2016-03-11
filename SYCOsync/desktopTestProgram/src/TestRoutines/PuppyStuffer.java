package TestRoutines;
import RandomNameGenerator.RandomNameGenerator;

/*
 * The puppy stuffer is mean to get random values to populate the test database
 * 
 * @author David Johnson
 * 
 */
public class PuppyStuffer {
	//a borrowed library off git hub
	RandomNameGenerator rand = new RandomNameGenerator();
	
	public String getRandomName() {
		return rand.next();
	}
	
	public String getRandomTeamName() {
		String name = getRandomName();
		return "The_" + name + "s";
	}
	
	public String getRandomLeagueName() {
		String name = getRandomName();
		return "League_of_" + name + "s";
	}
	
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
