package com.localservices.adapter;


import android.content.Context;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.localservices.R;
import com.localservices.activities.HealthTipsActivity;
import com.localservices.activities.NewsActivity;
import com.localservices.activities.RestaurantActivity;
import com.localservices.activities.RetailFoodActivity;
import com.localservices.models.LocalServicesModel;
import com.localservices.others.IntentPassing;
import com.localservices.others.Utils.UserPrefData;

import java.util.ArrayList;

/**
 * Created by wscube on 5/6/17.
 */

public class LocalServiceAdapter extends RecyclerView.Adapter<LocalServiceAdapter.ViewHolder>{

    Context context;
    ArrayList<LocalServicesModel> arrLocalServiceModel;
    AppCompatActivity activity;
    String selectedLanguage;
    public LocalServiceAdapter(AppCompatActivity activity,Context context,ArrayList<LocalServicesModel> arrLocalServiceAdapter)
    {
        this.activity=activity;
        this.context=context;
        this.arrLocalServiceModel=arrLocalServiceAdapter;
        selectedLanguage= new UserPrefData(context).getSelectedLanguage();
    }
    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view=LayoutInflater.from(context).inflate(R.layout.row_local_services,parent,false);
        ViewHolder viewHolder=new ViewHolder(view);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, final int position) {

        LocalServicesModel localServicesModel=arrLocalServiceModel.get(position);
      //  holder.txtLocalServiceName.setText(localServicesModel.getLsName());
        if(position==0) {
            holder.imgLocalService.setImageResource(R.drawable.retail_food);
            if(selectedLanguage.equals("english"))
            {
                holder.txtLocalServiceName.setText(localServicesModel.getLsName());
            }
            else if(selectedLanguage.equals("hindi"))
            {
                holder.txtLocalServiceName.setText("खुदरा भोजन");
            }
            else if(selectedLanguage.equals("spanish"))
            {
                holder.txtLocalServiceName.setText("Alimentos al por menor");
            }
        }
        else if(position==1) {
            holder.imgLocalService.setImageResource(R.drawable.health);
            if(selectedLanguage.equals("english"))
            {
                holder.txtLocalServiceName.setText("Health Tips");
            }
            else if(selectedLanguage.equals("hindi"))
            {
                holder.txtLocalServiceName.setText("स्वास्थ्य सुझाव");
            }
            else if(selectedLanguage.equals("spanish"))
            {
                holder.txtLocalServiceName.setText("Consejos de salud");
            }
        }
        else if(position==2) {
            holder.imgLocalService.setImageResource(R.drawable.news1);
            if(selectedLanguage.equals("english"))
            {
                holder.txtLocalServiceName.setText("News");
            }
            else if(selectedLanguage.equals("hindi"))
            {
                holder.txtLocalServiceName.setText("समाचार");
            }
            else if(selectedLanguage.equals("spanish"))
            {
                holder.txtLocalServiceName.setText("Noticias");
            }
        }
        else if(position==3) {
            holder.imgLocalService.setImageResource(R.drawable.restaurant);
            if(selectedLanguage.equals("english"))
            {
                holder.txtLocalServiceName.setText("Restaurants");
            }
            else if(selectedLanguage.equals("hindi"))
            {
                holder.txtLocalServiceName.setText("रेस्टोरेंट");
            }
            else if(selectedLanguage.equals("spanish"))
            {
                holder.txtLocalServiceName.setText("Restaurantes y Bares");
            }
        }

        holder.relMain.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(position==0)
                    IntentPassing.startActivity(RetailFoodActivity.class,activity);
                else if(position==1)
                    IntentPassing.startActivity(HealthTipsActivity.class,activity);
                else if(position==2)
                    IntentPassing.startActivity(NewsActivity.class,activity);
                else if (position==3)
                    IntentPassing.startActivity(RestaurantActivity.class,activity);
            }
        });
    }

    @Override
    public int getItemCount() {
        return arrLocalServiceModel.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        TextView txtLocalServiceName;
        ImageView imgLocalService;
        RelativeLayout relMain;
        public ViewHolder(View itemView) {
            super(itemView);
            relMain= (RelativeLayout) itemView.findViewById(R.id.relMain);
            txtLocalServiceName= (TextView) itemView.findViewById(R.id.txtLocalServicesName);
            imgLocalService= (ImageView) itemView.findViewById(R.id.imgLocalServices);
        }
    }
}
