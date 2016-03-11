package capstone.backend.examples.postToCloud.postToCloud;

import android.os.AsyncTask;
import android.widget.Toast;

import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.util.HashMap;

/**
 * Created by AnalEmbargo on 2/21/2016.
 */
public class RemoteDBSync
        extends AsyncTask<String, Void, String>
        implements ConnectionConstants {

    private LocalDBController controller;                                   //reference to LocalDBController
    private HttpURLConnection conn;                                         //http connection
    private URL url;                                                        //connection url object

    public RemoteDBSync(LocalDBController controller) {
        this.controller = controller;
        this.execute();                                                     //run asyncTask
    }

    @Override
    protected String doInBackground(String... params) {
        syncSQLiteMySQLDB();
        return null;
    }

    @Override
    protected  void onPostExecute(String result) {
        super.onPostExecute(result);
        //do nothing here for now
        //return update success or failure for now
    }

    /*
    Takes a hashmap of key/ value pairs and
    formats correctly for the post request in the form

    key1=value1&key2=value2&key3=value3...key(n)=value(n)

    key value pairs separated by & sign
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
        return paramsBuilder.toString();
    }

    //make a post request to the url with the given parameters
    //return the response in string form
    public String postRequest(String url, String params) throws Exception {
        StringBuilder responseBuffer = new StringBuilder();
        try
        {
            byte[] bytes;
            if(params != null && params.length() > 0) {
                bytes = params.getBytes();                                                      //convert  data to bytes
            } else {
                bytes = new byte[0];                                                            //or just make it zero
            }

            this.url = new URL(SERVER_URL);                                                      //
            conn = (HttpURLConnection) this.url.openConnection();                               //init the connection objects
            conn.setDoInput(true);
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

    // Method to Sync MySQL to SQLite DB
    public void syncSQLiteMySQLDB() {

        try
        {
            postRequest()
        } catch (Exception e) {

        }

        // Create AsycHttpClient object
        AsyncHttpClient client = new AsyncHttpClient();
        // Http Request Params Object
        RequestParams params = new RequestParams();
        // Show ProgressBar
        prgDialog.show();
        // Make Http call to getusers.php
        client.post("http://192.168.2.4:9000/mysqlsqlitesync/getusers.php", params, new AsyncHttpResponseHandler() {
            @Override
            public void onSuccess(String response) {
                // Hide ProgressBar
                prgDialog.hide();
                // Update SQLite DB with response sent by getusers.php
                updateSQLite(response);
            }
            // When error occured
            @Override
            public void onFailure(int statusCode, Throwable error, String content) {
                // TODO Auto-generated method stub
                // Hide ProgressBar
                prgDialog.hide();
                if (statusCode == 404) {
                    Toast.makeText(getApplicationContext(), "Requested resource not found", Toast.LENGTH_LONG).show();
                } else if (statusCode == 500) {
                    Toast.makeText(getApplicationContext(), "Something went wrong at server end", Toast.LENGTH_LONG).show();
                } else {
                    Toast.makeText(getApplicationContext(), "Unexpected Error occcured! [Most common Error: Device might not be connected to Internet]",
                            Toast.LENGTH_LONG).show();
                }
            }
        });
    }

    private void updateSQLite(String response){
        ArrayList<HashMap<String, String>> usersynclist;
        usersynclist = new ArrayList<HashMap<String, String>>();
        // Create GSON object
        Gson gson = new GsonBuilder().create();
        try {
            // Extract JSON array from the response
            JSONArray arr = new JSONArray(response);
            System.out.println(arr.length());
            // If no of array elements is not zero
            if(arr.length() != 0){
                // Loop through each array element, get JSON object which has userid and username
                for (int i = 0; i < arr.length(); i++) {
                    // Get JSON object
                    JSONObject obj = (JSONObject) arr.get(i);
                    System.out.println(obj.get("userId"));
                    System.out.println(obj.get("userName"));
                    // DB QueryValues Object to insert into SQLite
                    queryValues = new HashMap<String, String>();
                    // Add userID extracted from Object
                    queryValues.put("userId", obj.get("userId").toString());
                    // Add userName extracted from Object
                    queryValues.put("userName", obj.get("userName").toString());
                    // Insert User into SQLite DB
                    controller.insertUser(queryValues);
                    HashMap<String, String> map = new HashMap<String, String>();
                    // Add status for each User in Hashmap
                    map.put("Id", obj.get("userId").toString());
                    map.put("status", "1");
                    usersynclist.add(map);
                }
                // Inform Remote MySQL DB about the completion of Sync activity by passing Sync status of Users
                updateMySQLSyncSts(gson.toJson(usersynclist));
                // Reload the Main Activity
                reloadActivity();
            }
        } catch (JSONException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }

    private void updateMySQLSyncSts(String json) {
        System.out.println(json);
        AsyncHttpClient client = new AsyncHttpClient();
        RequestParams params = new RequestParams();
        params.put("syncsts", json);
        // Make Http call to updatesyncsts.php with JSON parameter which has Sync statuses of Users
        client.post("http://192.168.2.4:9000/mysqlsqlitesync/updatesyncsts.php", params, new AsyncHttpResponseHandler() {
            @Override
            public void onSuccess(String response) {
                Toast.makeText(getApplicationContext(),	"MySQL DB has been informed about Sync activity", Toast.LENGTH_LONG).show();
            }

            @Override
            public void onFailure(int statusCode, Throwable error, String content) {
                Toast.makeText(getApplicationContext(), "Error Occured", Toast.LENGTH_LONG).show();
            }
        });
    }


}
