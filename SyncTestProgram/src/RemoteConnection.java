import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.util.HashMap;

public class RemoteConnection {
	
	//private final String SERVER_URL = "http://localhost/sync.php";			//my test db
	private final String SERVER_URL = "http://localhost/SYCOsync/sync.php";			//my test db
	//private final String SERVER_URL = "http://localhost/stuffPlace.php";		//we are using
	private HttpURLConnection conn;             //http connection
    private URL url;   
    
    /*
     * from here:
     * 	http://stackoverflow.com/questions/17998869/netbeans-how-to-debug-a-post-request-php
     * 
     * We append xdebug information in this function so that the localhost/<pagename>
     * knows to connect to our netbeans instance.
     * NOTE:
     * 	THIS WILL NOT WORK REMOTELY, MUST BE LOCAL HOST
     * 			as far as i can tell...
     */
    private String parsePostParams(HashMap<String, String> paramsMap) throws Exception
    {
        StringBuilder paramsBuilder = new StringBuilder();
        for(String key: paramsMap.keySet()) {
            try {

                paramsBuilder.append(key);
                paramsBuilder.append("=");
                paramsBuilder.append(
                        URLEncoder.encode(paramsMap.get(key), "UTF-8"));            //we must use this encoding
                                                                                    //on the value only
                paramsBuilder.append("&");
                
            } catch (UnsupportedEncodingException e)
            {
                throw new Exception("param Parsing error: " + e.getMessage());
            }
        }
        //append the xdebug information
        //remove before production
        if(paramsBuilder.toString().endsWith("&")) {
        	paramsBuilder.append("XDEBUG_SESSION_START=netbeans-xdebug");
        } else {
        	paramsBuilder.append("&XDEBUG_SESSION_START=netbeans-xdebug");
        }
        return paramsBuilder.toString();
    }
    
	//make a post request to the url with the given parameters
    //return the response in string form
    private String postRequest(String params) throws Exception {
        StringBuilder responseBuffer = new StringBuilder();
        try
        {
            byte[] bytes = params.getBytes();   //convert the data to bytes

            this.url = new URL(SERVER_URL);                                                      //
            conn = (HttpURLConnection) this.url.openConnection();                               //init the connection objects
            conn.setDoInput(true);
            conn.setDoOutput(true);
            conn.setInstanceFollowRedirects(false);
            conn.setRequestMethod("POST");                                                      //set request method
            conn.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");       //set the attributes of the HTTP header
            conn.setRequestProperty("charset", "utf-8");                                        //more attributes...
            conn.setRequestProperty("Content-Length", Integer.toString(bytes.length));          //more attributes...
            conn.setConnectTimeout(10000);                                                      //set the timeout if things break

            DataOutputStream dataOutputStream = new DataOutputStream(conn.getOutputStream());   //write data across the socket
            dataOutputStream.write(bytes);
            dataOutputStream.flush();
            dataOutputStream.close();


            InputStreamReader reader = new InputStreamReader(conn.getInputStream());            //get the response
            int input;
            while((input = reader.read()) != -1)
            {
                responseBuffer.append((char)input);
            }
            reader.close();

        } catch (IOException e) {
            throw new Exception("Error making post Request, message: " + e.getMessage());
        } finally {
            conn.disconnect();
        }
        return responseBuffer.toString();                                                       //pass the response to onPostExecute()
    }
    
    public String doPostRequest(HashMap<String, String> paramsMap) {
    	try {
			return postRequest(parsePostParams(paramsMap));
		} catch (Exception e) {
			return e.getMessage();
		}
    }

}
