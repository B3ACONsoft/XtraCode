import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.InputStream;
import java.io.StringReader;

import javax.json.Json;
import javax.json.JsonArray;
import javax.json.JsonObject;
import javax.json.JsonReader;

public class figureOutThatJSON {
	
	public static void main(String[] args) {
		InputStream fInput = null;
		JsonReader jsonReader = null;
		JsonArray jsonArray = null;
		
		//StringReader stringReader = new StringReader() 
		File f = new File("C:\\B3ACONsoft\\XtraCode\\SYCOsync\\desktopTestProgram\\src\\testJsonInput.txt");
		
		try {
			fInput = new FileInputStream(f);
		} catch (FileNotFoundException e1) {
			e1.printStackTrace();
		}
		
		jsonReader = Json.createReader(fInput);
		jsonArray = (JsonArray) jsonReader.readArray();
		
		for(int i = 0; i < jsonArray.size(); i++) {
			System.out.println(jsonArray.get(i));
		}
	}

}
