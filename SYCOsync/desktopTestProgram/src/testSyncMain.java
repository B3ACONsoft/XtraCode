import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.InputStream;
import java.io.StringReader;

import javax.json.Json;
import javax.json.JsonArray;
import javax.json.JsonReader;

import Debugging.DebugFLAGS;
import TestRoutines.AdminTests;
import TestRoutines.CoachTests;
import TestRoutines.PuppyStuffer;
import TestRoutines.UserTests;
import TestRoutines.UserValidationTests;

/**
 * @author David Johnson
 *	This is the entry point of the testProgram.
 *	Test routines are staged in main.
 *	<br>
 *	Use debug toggle routines int main to set debugging options.
 */
public class testSyncMain {
	
	
	public static UserValidationTests 	userValidationTests = new UserValidationTests();
	public static AdminTests 			adminTests			= new AdminTests();
	public static CoachTests			coachTests			= new CoachTests();
	public static UserTests				userTests			= new UserTests();
	
	/**
	 * Set PHP debugging ON
	 */
	public static void debugPHP_ON() {
		DebugFLAGS.PHP_DEBUG = DebugFLAGS.SERVER_DEBUG_FLAGS.DEBUG_ON;
	}
	
	/**
	 * Set PHP debugging OFF
	 */
	public static void debugPHP_OFF() {
		DebugFLAGS.PHP_DEBUG = DebugFLAGS.SERVER_DEBUG_FLAGS.DEBUG_OFF;
	}
	
	/**
	 * Set Local Debugging ON
	 */
	public static void debugLocal_ON() {
		DebugFLAGS.LOCAL_DEBUG = DebugFLAGS.LOCAL_DEBUG_FLAGS.DEBUG_ON;
	}
	
	/**
	 * Set Local debugging OFF
	 */
	public static void debugLocal_OFF() {
		DebugFLAGS.LOCAL_DEBUG = DebugFLAGS.LOCAL_DEBUG_FLAGS.DEBUG_OFF;
	}
	
	public static void main(String[] args) {
		//debugPHP_ON();				
		debugPHP_OFF();
		//debugLocal_ON();
		debugLocal_OFF();
		
		//userValidationTests.testUserValidation();
		//AdminTests.testAdminGetAllData();
		//AdminTests.testAdminCreateUsers(3, 4, 6);
		//AdminTests.testAdminCreateTeams(1, 15, 15);
		//AdminTests.testAdminCreateLeagues(10);
		/*
		PuppyStuffer stuffer = new PuppyStuffer();
<<<<<<< HEAD
		for(int i = 0; i < 100; i++) {
			
		}
		*/

		//for(int i = 0; i < 25; i++) {
		//	System.out.println(stuffer.getRandomSportName());
		//stuffer.getJSONArray()
		//}
		//stuffer.doFullPuppyStuff();
		
		String siteResponse = AdminTests.testAdminGetAllSports();
		StringBuilder responseJsonBuilder = new StringBuilder();
		
		int i = 0;
		while(siteResponse.charAt(i) != '<' && siteResponse.charAt(i+1) != '!') {
			responseJsonBuilder.append(siteResponse).charAt(i);
			i++;
		}
		String responseJson = responseJsonBuilder.toString();
		StringReader stringReader = new StringReader(responseJson);
		
	
		JsonReader jsonReader = null;
		JsonArray jsonArray = null;
		
		
		jsonReader = Json.createReader(stringReader);
		jsonArray = (JsonArray) jsonReader.readArray();
		
		for(i = 0; i < jsonArray.size(); i++) {
			System.out.println(jsonArray.get(i));
		}
		
	}

}
