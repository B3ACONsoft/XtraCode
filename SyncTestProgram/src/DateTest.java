
 import java.io.IOException;
import java.net.InetAddress;
import java.net.UnknownHostException;
import java.sql.Timestamp;
import java.util.Date;
 import org.apache.commons.net.ntp.NTPUDPClient;
import org.apache.commons.net.ntp.TimeInfo;
 
public class DateTest {

	public static void main(String[] args) throws IOException {
		String TIME_SERVER = "time-a.nist.gov";   
        NTPUDPClient timeClient = new NTPUDPClient();
        InetAddress inetAddress = InetAddress.getByName(TIME_SERVER);
        TimeInfo timeInfo = timeClient.getTime(inetAddress);
        long returnTime = timeInfo.getReturnTime();
        //Date time = new Date(returnTime);
        Timestamp timeStamp = new Timestamp(returnTime);
        System.out.println("Time from " + TIME_SERVER + ": " + timeStamp.toString());
	}

}
